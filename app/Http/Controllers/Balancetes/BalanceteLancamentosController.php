<?php

namespace WebCondom\Http\Controllers\Balancetes;

use Toast;
use WebCondom\Http\Requests\Balancetes\BalanceteLancamentoRequest;
use WebCondom\Models\Balancetes\BalancateLancamento;
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

	public function __construct(BalancateLancamento $lancamento, Balancete $balancete, PlanoDeConta $plano, Fornecedor $fornecedor, Condominio $condominio)
	{
		$this->balancete_lancamento  	= $lancamento;
		$this->balancete 				= $balancete;
		$this->plano 					= $plano;
		$this->fornecedor 				= $fornecedor;
		$this->condominio 				= $condominio;
	}

	public function Listar()
	{
		$balancete_lancamentos = $this->balancete_lancamento->all();
		return view('balancetes.lancamentos.listar', compact('balancete_lancamentos'));
	}

	public function Criar()
	{
		$balancetes 	= $this->balancete->all();
		$plano_contas	= $this->plano->all();
		$fornecedores 	= $this->fornecedor->all();
		return view('balancetes.lancamentos.criar', compact('balancetes','plano_contas','fornecedores'));
	}

	public function Salvar(BalanceteLancamentoRequest $request)
	{
		$lancamento = $this->balancete_lancamento->create($request->all());
		if($lancamento){
			Toast::success('Balancete lançamento incluso com sucesso!','Inclusão!');
			return redirect()->route('balancetes.lancamentos.listar');
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
			return view('balancetes.lancamentos.exibir', compact('lancamento','balancetes','plano_contas','fornecedores'));
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
			return redirect()->route('balancetes.lancamentos.listar');
		}
		$this->balancete_lancamento->erro('Balancete lançamento não encontrado!','Erro!');
	}

	public function Excluir($id)
	{
		$lancamento = $this->balancete_lancamento->find($id);
		if($lancamento){
			$lancamento->delete();
			Toast::success('Balancete lançamento excluído com sucesso!','Exclusão!');
			return redirect()->route('balancetes.lancamentos.listar');
		}
		$this->balancete_lancamento->erro('Balancete lançamento não encontrado!','Erro!');
	}
}
