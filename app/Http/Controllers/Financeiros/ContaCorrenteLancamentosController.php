<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function Listar($conta_id, $dias = null)
    {
        $contaL             = ! is_null($conta_id) ? $this->conta->find($conta_id) : null;
        $condominio         = $this->condominio->where('id', $contaL->condominio_id)->first();
        $banco              = $this->banco->where('id', $contaL->banco_id)->first();
        $lancamentos        = $this->lancamento->all();
        $fornecedores       = $this->fornecedor->all();
        $contas             = $this->conta->all();
        $tipos              = $this->plano_conta->all();

        if($dias && $dias == 7){
            $dataAtual          = Carbon::now();
            $dataSeteDiasAtras  = $dataAtual->subDay(7);
            $dataFormatada      = $dataSeteDiasAtras->year."-".$dataSeteDiasAtras->month."-".$dataSeteDiasAtras->day;
            $lancamentos        = $this->lancamento->where('data_lancamento', $dataFormatada)->get();
        } else if($dias && $dias == 15) {
            $dataAtual          = Carbon::now();
            $dataSeteDiasAtras  = $dataAtual->subDay(15);
            $dataFormatada      = $dataSeteDiasAtras->year."-".$dataSeteDiasAtras->month."-".$dataSeteDiasAtras->day;
            $lancamentos        = $this->lancamento->where('data_lancamento', $dataFormatada)->get();
        } else if($dias && $dias == 30) {
            $dataAtual          = Carbon::now();
            $dataSeteDiasAtras  = $dataAtual->subDay(30);
            $dataFormatada      = $dataSeteDiasAtras->year."-".$dataSeteDiasAtras->month."-".$dataSeteDiasAtras->day;
            $lancamentos        = $this->lancamento->where('data_lancamento', $dataFormatada)->get();
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
