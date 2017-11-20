<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\CondominioTaxa;

class CondominiosTaxasController extends Controller
{
    public function Listar($idCondominio)
    {
        $taxas = CondominioTaxa::where('condominio_id', '=', $idCondominio)->get();
        return view('condominios.condominiostaxas.listar', compact('taxas', 'idCondominio'));
    }

    public function Criar($idCondominio)
    {
        $condominios = Condominio::all();
        return view('condominios.condominiostaxas.criar', compact('condominios', 'idCondominio'));
    }

    public function Salvar(Request $request)
    {
        CondominioTaxa::create($request->except('_token'));
        return redirect()->route('condominios.condominiostaxas.listar');
    }

    public function Exibir($id, $idCondominio)
    {
        $taxa = CondominioTaxa::find($id) ? CondominioTaxa::find($id) : null;
        $condominios = Condominio::all();
        if ($taxa)
            return view('condominios.condominiostaxas.exibir', compact('taxa', 'condominios', 'idCondominio'));
        else
            return redirect()->route('condominios.condominiostaxas.criar');
    }

    public function Alterar(Request $request, $id, $idCondominio)
    {
        //dd($request->except($request->all()));
        CondominioTaxa::find($id)->update($request->except('_token'));
        return redirect()->route('condominios.condominiostaxas.exibir', ['id' => $id, 'idCondominio' => $idCondominio]);
    }

    public function Excluir($id, $idCondominio)
    {
        CondominioTaxa::find($id)->delete();
        return redirect()->route('condominios.condominiostaxas.listar', ['idCondominio' => $idCondominio]);
    }
}
