<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Condominios\TaxaRequest;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\CondominioTaxa;

class CondominiosTaxasController extends Controller
{
	private $taxa;
	private $condominio;

	public function __construct(CondominioTaxa $taxa, Condominio $condominio)
	{
		$this->taxa 		= $taxa;
		$this->condominio 	= $condominio;
	}

	public function Listar($idCondominio)
    {
        $taxas = $this->taxa->where('condominio_id', '=', $idCondominio)->get();
        return view('condominios.condominiostaxas.listar', compact('taxas', 'idCondominio'));
    }

    public function Criar($idCondominio)
    {
        $condominios = $this->condominio->all();
        return view('condominios.condominiostaxas.criar', compact('condominios', 'idCondominio'));
    }

    public function Salvar(TaxaRequest $request, $idCondominio)
    {
        $taxa = $this->taxa->create($request->all());
        $taxa->condominio_id = $idCondominio;
        $taxa->save();
		Toast::success('Taxa para esse condomínio incluído com sucesso!', 'Inclusão!');
        return redirect()->route('condominios.condominios.exibir', ['id' => $idCondominio]);
    }

    public function Exibir($id, $idCondominio)
    {
        $taxa = $this->taxa->find($id) ? $this->taxa->find($id) : null;
        $condominios = $this->condominio->all();
        if ($taxa)
            return view('condominios.condominiostaxas.exibir', compact('taxa', 'condominios', 'idCondominio'));
        else
            return redirect()->route('condominios.condominiostaxas.criar');
    }

    public function Alterar(TaxaRequest $request, $id, $idCondominio)
    {
        $condominio_taxa = $this->taxa->find($id);
        if($condominio_taxa){
			$condominio_taxa->update($request->all());
			Toast::success('Condomínio alterado com sucesso!', 'Alteração!');
			return redirect()->route('condominios.condominios.exibir', ['id' => $idCondominio]);
		}
		Toast::error('Taxa não encontrada!', 'Erro!');
		return redirect()->route('condominios.condominios.exibir',  ['id' => $idCondominio]);
    }

    public function Excluir($id, $idCondominio)
    {
    	if($taxa_cond = $this->taxa->find($id)){
    		$taxa_cond->delete($id);
			Toast::success('Taxa desse condomínio excluída!', 'Exclusão!');
			return redirect()->route('condominios.condominios.exibir', ['idCondominio' => $idCondominio]);
		}
		Toast::error('Taxa não encontrada!', 'Erro!');
		return redirect()->route('condominios.condominios.exibir', ['idCondominio' => $idCondominio]);
    }
}
