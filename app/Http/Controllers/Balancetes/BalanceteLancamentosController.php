<?php

namespace WebCondom\Http\Controllers\Balancetes;

use Toast;
use WebCondom\Http\Requests\Balancetes\BalanceteLancamentoRequest;
use WebCondom\Models\Balancetes\BalanceteLancamento;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Balancetes\Balancete;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Entidades\Fornecedor;
use WebCondom\Models\Financeiros\PlanoDeConta;

class BalanceteLancamentosController extends Controller
{
	private $balancete_lancamento;
	private $balancete;
	private $plano;
	private $fornecedor;
	private $condominio;

	public function __construct(BalanceteLancamento $lancamento, Balancete $balancete, PlanoDeConta $plano, Fornecedor $fornecedor, Condominio $condominio)
	{
		$this->balancete_lancamento  	= $lancamento;
		$this->balancete 				= $balancete;
		$this->plano 					= $plano;
		$this->fornecedor 				= $fornecedor;
		$this->condominio 				= $condominio;
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
	public function Listar($idBalancete)
	{
		$balancete_lancamentos = [];
		if( $balancete = $this->balancete->find($idBalancete) ){
			$balancete_lancamentos = $balancete->lancamentos;
            $debito_periodo   = $this->DebitoPeriodo($balancete_lancamentos);
            $credito_periodo  = $this->CreditoPeriodo($balancete_lancamentos);

			return view('balancetes.lancamentos.listar', compact('balancete_lancamentos','idBalancete','debito_periodo','credito_periodo'));
		}
		Toast::error('Nenhum balancete com esse ID encontrado!', 'Erro!');
		return view('balancetes.lancamentos.listar',compact('balancete_lancamentos','idBalancete'));
	}

	public function Criar($idBalancete)
	{
		$balancetes 	= $this->balancete->all();
		$plano_contas	= $this->plano->all();
		$fornecedores 	= $this->fornecedor->all();
		return view('balancetes.lancamentos.criar', compact('balancetes','plano_contas','fornecedores','idBalancete'));
	}

	public function Salvar(BalanceteLancamentoRequest $request)
	{
		if( $lancamento = $this->balancete_lancamento->create($request->all()) ){
			Toast::success('Balancete lançamento incluso com sucesso!','Inclusão!');
			return redirect()->route('balancetes.lancamentos.listar',['idBalancete' => $request->balancete_id]);
		}
		$this->balancete_lancamento->erro('Balancete lançamento não criado!','Erro!');
	}

	public function Exibir($id)
	{
		$lancamento = $this->balancete_lancamento->find($id) or null;
		$balancetes = $this->balancete->all();
		$plano_contas	= $this->plano->all();
		$fornecedores 	= $this->fornecedor->all();
		if ($lancamento) {
			return view('balancetes.lancamentos.exibir', compact('lancamento','balancetes','plano_contas','fornecedores'))
				->with('idBalancete',$lancamento ? $lancamento->balancete_id : null);
		} else {
			$this->balancete_lancamento->erro('Balancete lançamento não encontrado!','Erro!');
		}
	}

	public function Alterar(BalanceteLancamentoRequest $request, $id)
	{
		$lancamento = $this->balancete_lancamento->find($id) or null;

		if($lancamento){
			$lancamento->update($request->all());
			Toast::success('Balancete lançamento alterado com sucesso!','Alteração!');
			return redirect()->route('balancetes.lancamentos.listar',['idBalancete' => $lancamento->balancete_id]);
		}
		$this->balancete_lancamento->erro('Balancete lançamento não encontrado!','Erro!');
	}

	public function Excluir($id)
	{
		$lancamento = $this->balancete_lancamento->find($id);
		if($lancamento){
			$balancete_id = $lancamento->balancete_id;
			$lancamento->delete();
			Toast::success('Balancete lançamento excluído com sucesso!','Exclusão!');
			return redirect()->route('balancetes.lancamentos.listar',['idBalancete'=>$balancete_id]);
		}
		$this->balancete_lancamento->erro('Balancete lançamento não encontrado!','Erro!');
	}
}
