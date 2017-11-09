<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\CondominioTaxa;

class CondominiosTaxasController extends Controller
{
    public function Listar($idCondominio = null)
    {
        if($idCondominio){
            $taxas = CondominioTaxa::where('condominio_id', '=', $idCondominio)->get();
            return view('condominios.condominiostaxas.listar', compact('taxas'));
        }
        $taxas = CondominioTaxa::all();
        return view('condominios.condominiostaxas.listar', compact('taxas'));
    }

    public function Criar()
    {
        $condominios = Condominio::all();
        return view('condominios.condominiostaxas.criar', compact('condominios'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        CondominioTaxa::create($request->except('_token'));
        return redirect()->route('condominios.condominiostaxas.listar');
    }

    public function Exibir($id)
    {
        $taxa = CondominioTaxa::find($id) ? CondominioTaxa::find($id) : null;
        $condominios = Condominio::all();
        if($taxa){
            return view('condominios.condominiostaxas.exibir', compact('taxa', 'condominios'));
        }
        else
            return redirect()->route('condominios.condominiostaxas.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        CondominioTaxa::find($id)->update($request->except('_token'));
        return redirect()->route('condominios.condominiostaxas.listar');
    }

    public function Excluir($id)
    {
        CondominioTaxa::find($id)->delete();
        return redirect()->route('condominios.condominiostaxas.listar');
    }
}
