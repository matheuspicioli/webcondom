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

    public function LancamentosPeriodo($dias, $conta_id)
    {
        $data_atual             = $this->lancamento->where('conta_corrente_id', $conta_id)->orderBy('data_lancamento', 'DESC')->first()->data_lancamento;
        $data_atual_formatada   = $this->lancamento->where('conta_corrente_id', $conta_id)->orderBy('data_lancamento', 'DESC')->first()->data_lancamento->toDateString();
        $data_inicio_periodo    = $data_atual->subDay($dias);
        $data_inicio_formatada  = $data_inicio_periodo->format('Y-m-d');

        return $this->lancamento->where('conta_corrente_id','=',$conta_id)->where('data_lancamento', '>=', $data_inicio_formatada)->where('data_lancamento', '<=', $data_atual_formatada)->orderBy('data_lancamento', 'ASC')->get();
        //return $this->lancamento->whereBetween('data_lancamento',[ $data_inicio_formatada,$data_atual_formatada ])->orderBy('data_lancamento', 'ASC')->get();
    }

    public function LancamentosAnteriores($dia_anterior, $conta_id)
    {
        $data_inicial_formatada   = $this->lancamento->where('conta_corrente_id', $conta_id)->orderBy('data_lancamento', 'ASC')->first()->data_lancamento->toDateString();
        $data_ultimo_dia_anterior = $dia_anterior;
        $data_ultimo_formatada    = $data_ultimo_dia_anterior->format('Y-m-d');

        return $this->lancamento->where('conta_corrente_id','=',$conta_id)->where('data_lancamento','>=', $data_inicial_formatada)->where('data_lancamento', '<=',$data_ultimo_formatada )->get();
        //return $this->lancamento->whereBetween('data_lancamento',[ $data_inicial_formatada,$data_ultimo_formatada ])->get();
    }

    public function LancamentosEntre($data_inicial_periodo, $data_final_periodo, $conta_id)
    {
        return $this->lancamento->where('conta_corrente_id', $conta_id)
                                ->where('data_lancamento','>=', $data_inicial_periodo)
                                ->where('data_lancamento', '<=', $data_final_periodo)
                                ->orderBy('data_lancamento','ASC')->get();
    }

    public function SaldoCompensadoAnterior($lancamentosAnteriores)
    {
        $collection_compensado_anterior = $lancamentosAnteriores->map(function ($compensadoAnterior) {
            if ($compensadoAnterior->compensado == 'Sim') {
                if ($compensadoAnterior->tipo == 'Debito') {
                    return $compensadoAnterior->valor * -1;
                } else {
                    return $compensadoAnterior->valor;
                }
            }
        });
        if ($collection_compensado_anterior)
            return $collection_compensado_anterior->sum();
        else
            return 0.00;
    }

    public function SaldoCompensado($lancamentos)
    {
        $collection_compensado = $lancamentos->map(function ($compensado) {
            if ($compensado->compensado == 'Sim') {
                if ($compensado->tipo == 'Debito')
                    return $compensado->valor * -1;
                else
                    return $compensado->valor;
            }
        });
        if ($collection_compensado) {
            return $collection_compensado->sum();
        } else {
            return 0.00;
        };
    }

    public function SaldoAnterior ($lancamentosAnteriores)
    {
        $lancamentos_anteriores_map = $lancamentosAnteriores->map(function ($lancamentoAnterior) {
            if ($lancamentoAnterior->tipo == 'Debito') {
                return $lancamentoAnterior->valor * -1;
            } else {
                return $lancamentoAnterior->valor;
            }
        });
        if ($lancamentos_anteriores_map)
            return $lancamentos_anteriores_map->sum();
        else
            return 0.00;
    }

    public function SaldoLancamento ($lancamentos)
    {
        $lancamentos_map = $lancamentos->map(function ($lancamentoPeriodo) {
            if ($lancamentoPeriodo->tipo == 'Debito') {
                return ($lancamentoPeriodo->valor * -1);
            } else {
                return ($lancamentoPeriodo->valor);
            }
        });
        if ($lancamentos_map)
            return $lancamentos_map->sum();
        else
            return 0.00;
    }

    public function DebitoPeriodo ($lancamentos)
    {
        $debitos_map = $lancamentos->map(function ($debitoPeriodo) {
            if ($debitoPeriodo->tipo == 'Debito') {
                return $debitoPeriodo->valor;
            }
        });
        if ($debitos_map)
            return $debitos_map->sum();
        else
            return 0.00;
    }

    public function CreditoPeriodo ($lancamentos)
    {
        $creditos_map = $lancamentos->map(function ($creditoPeriodo) {
            if ($creditoPeriodo->tipo == 'Credito') {
                return $creditoPeriodo->valor;
            }
        });
        if ($creditos_map)
            return $creditos_map->sum();
        else
            return 0.00;
    }

    public function ListarDatas(Request $request)
    {
        $data_inicial_array = explode('-', $request->data_inicial);
        $data_final_array   = explode('-', $request->data_final);

        $data_inicial_anterior = Carbon::create($data_inicial_array[0], $data_inicial_array[1], $data_inicial_array[2]);
        $data_inicial   = Carbon::create($data_inicial_array[0], $data_inicial_array[1], $data_inicial_array[2]);
        $data_final     = Carbon::create($data_final_array[0], $data_final_array[1], $data_final_array[2]);
        $data_inicio    = Carbon::create($data_inicial_array[0], $data_inicial_array[1], $data_inicial_array[2]);
        $data_fim       = Carbon::create($data_final_array[0], $data_final_array[1], $data_final_array[2]);
        $lancamentos    = $this->LancamentosEntre($data_inicio->subDay(1), $data_fim->addDay(1), $request->conta_id);
        $contaL         = ! is_null($request->conta_id) ? $this->conta->find($request->conta_id) : null;
        $condominio     = $this->condominio->where('id', $contaL->condominio_id)->first();
        $banco          = $this->banco->where('id', $contaL->banco_id)->first();
        $fornecedores   = $this->fornecedor->all();
        $contas         = $this->conta->all();
        $tipos          = $this->plano_conta->all();
        $dias           = null;
        $lancamentosAnteriores = $this->LancamentosAnteriores($data_inicial_anterior->subDay(1),$request->conta_id);

        $saldo_compensado_anterior = $this->SaldoCompensadoAnterior($lancamentosAnteriores,$request->conta_id);
        $saldo_compensado = $saldo_compensado_anterior + $this->SaldoCompensado($lancamentos);
        $saldo_anterior = $this->SaldoAnterior($lancamentosAnteriores);
        $saldo_lancamento = $saldo_anterior + $this->SaldoLancamento($lancamentos);
        $debito_periodo   = $this->DebitoPeriodo($lancamentos);
        $credito_periodo  = $this->CreditoPeriodo($lancamentos);

        if($contaL)
            return view('financeiros.lancamentos.listar', compact('credito_periodo','debito_periodo','saldo_compensado','saldo_lancamento','saldo_anterior','data_final','data_inicial','contaL','lancamentos','fornecedores','condominio','banco','contas','tipos','dias'));

        return view('financeiros.lancamentos.listar', compact('credito_periodo','debito_periodo','saldo_compensado','saldo_lancamento','saldo_anterior','data_final','data_inicial','lancamentos','fornecedores','contas','tipos','dias'));
    }

    public function Listar($conta_id, $dias = null)
    {
        $contaL             = ! is_null($conta_id) ? $this->conta->find($conta_id) : null;
        $condominio         = $this->condominio->where('id', $contaL->condominio_id)->first();
        $banco              = $this->banco->where('id', $contaL->banco_id)->first();
        $fornecedores       = $this->fornecedor->all();
        $contas             = $this->conta->all();
        $tipos              = $this->plano_conta->all();
        $lancamentos        = $this->lancamento->where('conta_corrente_id', $conta_id)->orderBy('data_lancamento', 'ASC')->get();

        if($dias) {
            $lancamentos            = $this->LancamentosPeriodo($dias,$conta_id);
        }
        if(!$lancamentos->isEmpty()) {
            $lancamento_ordenado = $this->lancamento->orderBy('data_lancamento', 'ASC')->get();

            if ($lancamento_ordenado) {
                $primeiro_lancamento = $lancamento_ordenado->first();
                if ($primeiro_lancamento) {
                    $ultimo_lancamento = $lancamentos->sortBy('data_lancamento')->last()->data_lancamento;
                    $ultimo_lancamento_dia_anterior = $lancamentos->sortBy('data_lancamento')->first()->data_lancamento->subDay(1);
                    $lancamentosAnteriores = $this->LancamentosAnteriores($ultimo_lancamento_dia_anterior,$conta_id);

                    $saldo_compensado_anterior = $this->SaldoCompensadoAnterior($lancamentosAnteriores,$conta_id);
                    $saldo_compensado = $saldo_compensado_anterior + $this->SaldoCompensado($lancamentos);
                    $saldo_anterior = $this->SaldoAnterior($lancamentosAnteriores);
                    $saldo_lancamento = $saldo_anterior + $this->SaldoLancamento($lancamentos);
                    $debito_periodo   = $this->DebitoPeriodo($lancamentos);
                    $credito_periodo  = $this->CreditoPeriodo($lancamentos);
                }
                return view('financeiros.lancamentos.listar', compact('credito_periodo','debito_periodo','saldo_lancamento', 'saldo_anterior', 'saldo_compensado', 'contaL', 'lancamentos', 'fornecedores', 'condominio', 'banco', 'contas', 'tipos', 'dias'));
            }
        }
        if($contaL)
            return view('financeiros.lancamentos.listar', compact('credito_periodo','debito_periodo','saldo_lancamento', 'saldo_anterior','saldo_compensado','contaL','lancamentos','fornecedores','condominio','banco','contas','tipos','dias'));

        return view('financeiros.lancamentos.listar', compact('credito_periodo','debito_periodo','saldo_lancamento', 'saldo_anterior','saldo_compensado','lancamentos','fornecedores','contas','tipos','dias'));
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
    }

    public function Excluir($id, $conta_id, $dias = null)
    {
        $lancamento = ContaCorrenteLancamento::find($id);
        if($lancamento){
            $lancamento->delete();
            if($dias) {
                return redirect()->route('financeiros.lancamentos.listar', ['conta_id' => $conta_id, 'dias' => $dias]);
            } else {
                return redirect()->route('financeiros.lancamentos.listar', ['conta_id' => $conta_id, 'dias' => null]);
            }
        }
    }
    public function Exibir($id, $conta_id, $dias = null)
    {
        $contaL             = ! is_null($conta_id) ? $this->conta->find($conta_id) : null;
        $condominio         = $this->condominio->where('id', $contaL->condominio_id)->first();
        $banco              = $this->banco->where('id', $contaL->banco_id)->first();
        $fornecedores       = $this->fornecedor->all();
        $contas             = $this->conta->all();
        $tipos              = $this->plano_conta->all();
        $lancamento         = ContaCorrenteLancamento::find($id) ? ContaCorrenteLancamento::find($id) : null;
        if ($lancamento) {
            return view('financeiros.lancamentos.exibir', compact('lancamento','contaL','condominio','banco','fornecedores','tipos','contas','dias'));
        }
    }

    public function Alterar(Request $request, $id, $conta_id, $dias = null)
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
        $lancamento = ContaCorrenteLancamento::find($id);
        if($lancamento){
            $lancamento->update($dados);
            //return redirect()->route('financeiros.lancamentos.listar',['conta_id' => $conta_id]);
            if($dias) {
                return redirect()->route('financeiros.lancamentos.listar', ['conta_id' => $conta_id, 'dias' => $dias]);
            } else {
                return redirect()->route('financeiros.lancamentos.listar', ['conta_id' => $conta_id, 'dias' => $dias]);
            }

        }
        return redirect()->route('financeiros.lancamentos.listar',['conta_id' => $conta_id, 'dias' => $dias]);
    }


}
