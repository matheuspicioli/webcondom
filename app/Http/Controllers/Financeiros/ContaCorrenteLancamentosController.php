<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Carbon\Carbon;
use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Entidades\Fornecedor;
use WebCondom\Models\Financeiros\Banco;
use WebCondom\Models\Financeiros\Tipo;
use WebCondom\Models\Financeiros\ContaCorrente;
use WebCondom\Models\Financeiros\ContaCorrenteLancamento;
use WebCondom\Models\Condominios\Condominio;

class ContaCorrenteLancamentosController extends Controller
{
    private $lancamento;
    private $conta;
    private $condominio;
    private $banco;
    private $fornecedor;
    private $tipo;

    public function __construct(ContaCorrenteLancamento $lancamento, ContaCorrente $conta,
                                Condominio $condominio, Banco $banco, Fornecedor $fornecedor, Tipo $tipo)
    {
        $this->lancamento   = $lancamento;
        $this->conta        = $conta;
        $this->condominio   = $condominio;
        $this->banco        = $banco;
        $this->fornecedor   = $fornecedor;
        $this->tipo         = $tipo;
    }

    public function Listar($conta_id = null, $dias = null)
    {
        $conta          = $conta_id ? $this->conta->find($conta_id) : '';
        $condominio     = $this->condominio->where('id', $conta->condominio_id)->first();
        $banco          = $this->banco->where('id', $conta->banco_id)->first();
        $lancamentos    = $this->lancamento->all();
        $fornecedores   = $this->fornecedor->all();
        $contas         = $this->conta->all();
        $tipos          = $this->tipo->all();

        if($dias && $dias == 7){
            $dataAtual          = Carbon::now();
            $dataSeteDiasAtras  = $dataAtual->subDay(7);
            $dataFormatada      = $dataSeteDiasAtras->year."-".$dataSeteDiasAtras->month."-".$dataSeteDiasAtras->day;
            $lancamentos        = $this->lancamento->where('created_at', $dataFormatada)->get();
        } else if($dias && $dias == 15) {
            $dataAtual          = Carbon::now();
            $dataSeteDiasAtras  = $dataAtual->subDay(15);
            $dataFormatada      = $dataSeteDiasAtras->year."-".$dataSeteDiasAtras->month."-".$dataSeteDiasAtras->day;
            $lancamentos        = $this->lancamento->where('created_at', $dataFormatada)->get();
        } else if($dias && $dias == 30) {
            $dataAtual          = Carbon::now();
            $dataSeteDiasAtras  = $dataAtual->subDay(30);
            $dataFormatada      = $dataSeteDiasAtras->year."-".$dataSeteDiasAtras->month."-".$dataSeteDiasAtras->day;
            $lancamentos        = $this->lancamento->where('created_at', $dataFormatada)->get();
        }

        if($conta)
            return view('financeiros.lancamentos.listar', compact('conta','lancamentos','fornecedores','condominio','banco','contas','tipos'));

        return view('financeiros.lancamentos.listar', compact('lancamentos','fornecedores','contas','tipos'));
    }

    public function Salvar(Request $request)
    {
        $dados = $request->all();
        $dados['compensado']    = $dados['compensado']  == "on" ? 'Sim' : 'Nao';
        $dados['cheque']        = $dados['cheque']      == "on" ? 'Sim' : 'Nao';
        $dados['assinado']      = $dados['assinado']    == "on" ? 'Sim' : 'Nao';
        $this->lancamento->create($dados);
        return redirect()->back();
    }
}
