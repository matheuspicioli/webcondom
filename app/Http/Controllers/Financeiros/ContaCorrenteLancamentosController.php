<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use function PHPSTORM_META\type;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Entidades\Fornecedor;
use WebCondom\Models\Financeiros\Banco;
use WebCondom\Models\Financeiros\Conta;
use WebCondom\Models\Financeiros\Grupo;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Models\Financeiros\ContaCorrente;
use WebCondom\Models\Financeiros\ContaCorrenteLancamento;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Traits\Financeiros\PlanoDeContas;

class ContaCorrenteLancamentosController extends Controller
{
    use PlanoDeContas;

    private $lancamento;
    private $conta;
    private $condominio;
    private $banco;
    private $fornecedor;
    private $plano_conta;
    private $grupo;
    private $contaPlano;

    public function __construct(ContaCorrenteLancamento $lancamento, ContaCorrente $conta,
                                Condominio $condominio, Banco $banco, Fornecedor $fornecedor, PlanoDeConta $plano_conta,
                                Grupo $grupo, Conta $contaPlano
                                )
    {
        $this->lancamento   = $lancamento;
        $this->conta        = $conta;
        $this->condominio   = $condominio;
        $this->banco        = $banco;
        $this->fornecedor   = $fornecedor;
        $this->plano_conta  = $plano_conta;
        $this->grupo        = $grupo;
        $this->contaPlano   = $contaPlano;
    }

    public function SepararPlanoContas($plano, $atributo)
    {
        $plano = explode('.', $plano);
        if( $atributo == 'tipo' ){
            return $plano[0];
        } else if ( $atributo == 'grupo' ){
            return $plano[1];
        } else {
            return $plano[2];
        }
    }

    public function LancamentosAnteriores($dias_anteriores)
    {
        $data_atual             = Carbon::now();
        $data_sete_dias_atras   = $data_atual->subDay($dias_anteriores);
        $data_formatada         = $data_sete_dias_atras->format('Y-m-d');
        $data_atual_formatada   = Carbon::now()->toDateString();
        return $this->lancamento->whereBetween('data_lancamento',[ $data_formatada,$data_atual_formatada ])->get();
    }

    public function LancamentosEntre($data_incial, $data_final)
    {
        return $this->lancamento->whereBetween('data_lancamento',[ $data_incial, $data_final ])->get();
    }

    public function ListarDatas(Request $request)
    {
        $data_inicial_array = explode('-', $request->data_inicial);
        $data_final_array   = explode('-', $request->data_final);

        $data_inicial   = Carbon::create($data_inicial_array[0], $data_inicial_array[1], $data_inicial_array[2]);
        $data_final     = Carbon::create($data_final_array[0], $data_final_array[1], $data_final_array[2]);
        //dd($data_inicial, $data_final);
        $lancamentos    = $this->LancamentosEntre($data_inicial, $data_final);
        $contaL         = ! is_null($request->conta_id) ? $this->conta->find($request->conta_id) : null;
        $condominio     = $this->condominio->where('id', $contaL->condominio_id)->first();
        $banco          = $this->banco->where('id', $contaL->banco_id)->first();
        $fornecedores   = $this->fornecedor->all();
        $contas         = $this->conta->all();
        $tipos          = $this->plano_conta->all();

        if($contaL)
            return view('financeiros.lancamentos.listar', compact('data_final','data_inicial','contaL','lancamentos','fornecedores','condominio','banco','contas','tipos'));

        return view('financeiros.lancamentos.listar', compact('data_final','data_inicial','lancamentos','fornecedores','contas','tipos'));
    }

    public function Listar($conta_id, $dias = null)
    {
        $contaL             = ! is_null($conta_id) ? $this->conta->find($conta_id) : null;
        $condominio         = $this->condominio->where('id', $contaL->condominio_id)->first();
        $banco              = $this->banco->where('id', $contaL->banco_id)->first();
        $fornecedores       = $this->fornecedor->all();
        $contas             = $this->conta->all();
        $tipos              = $this->plano_conta->all();
        $lancamentos        = $this->lancamento->all();
        if($dias) {
            $lancamentos    = $this->LancamentosAnteriores($dias);
        }
        if(!$lancamentos->isEmpty()){
            $collection_compensado = $lancamentos->map(function($lancamento){
                if($lancamento->compensado == 'Sim')
                    return $lancamento->valor;
            });
            $saldo_compensado       = $collection_compensado->sum();
            $lancamento_ordenado    = $this->lancamento->orderBy('data_lancamento', 'ASC');

            if($lancamento_ordenado){
                $primeiro_lancamento    = $lancamento_ordenado->first();
                if($primeiro_lancamento){
                    //Último lançamento até um dia anterior
                    $ultimo_lancamento_dia_anterior = $lancamentos->sortBy('data_lancamento')->last()->data_lancamento->subDay(1);
                    //Último lançamento
                    $ultimo_lancamento                      = $lancamentos->sortBy('data_lancamento')->last()->data_lancamento;
                    $lancamentos_primeiro_ultimo            = $this->lancamento->whereBetween('data_lancamento', [$primeiro_lancamento->data_lancamento, $ultimo_lancamento->toDateString()])->get();
                    $lancamentos_primeiro_ultimo_anterior   = $this->lancamento->whereBetween('data_lancamento', [$primeiro_lancamento->data_lancamento, $ultimo_lancamento_dia_anterior->toDateString()])->get();
                    $lancamentos_map                = $lancamentos_primeiro_ultimo_anterior->map(function($lancamento){
                        if($lancamento->tipo == 'Debito')
                            return ($lancamento->valor - $lancamento->valor);
                        else
                            return $lancamento->valor = $lancamento->valor;
                    });
                    $saldo_anterior = $lancamentos_map->sum();
                    $lancamentos_primeiro_map = $lancamentos_primeiro_ultimo->map(function($lancamento){
                        return $lancamento->valor;
                    });
                    $saldo_lancamento = $lancamentos_primeiro_map->sum();
                }
            }
            return view('financeiros.lancamentos.listar', compact('saldo_lancamento','saldo_anterior','saldo_compensado','contaL','lancamentos','fornecedores','condominio','banco','contas','tipos'));
        }

        if($contaL)
            return view('financeiros.lancamentos.listar', compact('contaL','lancamentos','fornecedores','condominio','banco','contas','tipos'));

        return view('financeiros.lancamentos.listar', compact('lancamentos','fornecedores','contas','tipos'));
    }

    public function Salvar(Request $request)
    {
        $dados = $request->all();

        if ($request->exists('plano_conta')) {
            $dados['plano_conta_id']    = $request->plano_conta;
        }
        if ( $request->exists('cheque') ) {
            $dados['cheque'] = $dados['cheque'] == "on" ? 'Sim' : 'Nao';
        }
        if ( $request->exists('compensado') ) {
            $dados['compensado'] = $dados['compensado'] == "on" ? 'Sim' : 'Nao';
        }
        if ( $request->exists('assinado') ) {
            $dados['assinado'] = $dados['assinado'] == "on" ? 'Sim' : 'Nao';
        }
        $this->lancamento->create($dados);
        return redirect()->back();
        //return redirect()->route('financeiros.lancamentos.listar', ['conta_id' => $request->conta_id]);
    }
}
