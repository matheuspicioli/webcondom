<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\CondominioTaxa;

class CondominiosTaxasController extends Controller
{
    public function Listar()
    {
        $taxas = CondominioTaxa::all();
        return view('condominios.condominiostaxas.listar', compact('taxas'));
    }

    public function Criar()
    {
        return view('condominios.condominiostaxas.criar');
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

        if($taxa){
            return view('condominios.condominiostaxas.exibir', compact('taxa'));
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
