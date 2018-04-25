<?php

namespace WebCondom\Http\Controllers\Balancetes;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Models\Balancetes\Balancete;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Balancetes\BalanceteRequest;
use WebCondom\Models\Condominios\Condominio;

class BalancetesController extends Controller
{
	private $balancete;
	private $condominio;

	public function __construct(Balancete $balancete, Condominio $condominio)
	{
		$this->balancete  = $balancete;
		$this->condominio = $condominio;
	}

	public function Listar()
	{
		$balancetes = $this->balancete->all();
		$condominios = $this->condominio->all();
		return view('balancetes.balancetes.listar',compact('balancetes','condominios'));
	}

	public function ListarPost(Request $request)
	{
		$condominios = $this->condominio->all();
		if($request->has('condominio_id') != null) {
			if( $condominio = $this->condominio->find($request->condominio_id) ) {
				$condominio_balancetes = $condominio->balancetes;
			}
		}
		return view('balancetes.balancetes.listar',compact('condominios'))
			->with('balancetes',$condominio_balancetes)
			->with('condominio_titulo',$condominio);
	}

	public function Criar()
	{
		$condominios = $this->condominio->all();
		return view('balancetes.balancetes.criar',compact('condominios'));
	}

	public function Salvar(BalanceteRequest $request)
	{
		$balancete = $this->balancete->create($request->all());
		if($balancete){
			Toast::success('Balancete incluso com sucesso!','Inclusão!');
			return redirect()->route('financeiros.balancetes.listar');
		}
		$this->balancete->erro('Balancete não criado!','Erro!');
	}

	public function Exibir($id)
	{
		$balancete = $this->balancete->find($id) or null;
		$condominios = $this->condominio->all();

		if ($balancete) {
			return view('balancetes.balancetes.exibir', compact('balancete','condominios'));
		} else {
			$this->balancete->erro('Balancete não encontrado!','Erro!');
		}
	}

	public function Alterar(BalanceteRequest $request, $id)
	{
		$balancete = $this->balancete->find($id) or null;

		if($balancete){
			$balancete->update($request->all());
			Toast::success('Balancete alterado com sucesso!','Alteração!');
			return redirect()->route('financeiros.balancetes.listar');
		}
		$this->balancete->erro('Balancete não encontrado!','Erro!');
	}

	public function Excluir($id)
	{
		$balancete = $this->balancete->find($id);
		if($balancete){
			$balancete->delete();
			Toast::success('Balancete excluído com sucesso!','Exclusão!');
			return redirect()->route('financeiros.balancetes.listar');
		}
		$this->balancete->erro('Balancete não encontrado!','Erro!');
	}
}
