<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Diversos\RegimeCasamento;

class RegimesCasamentosController extends Controller
{
    public function Listar()
    {
        $regimeCasamento = RegimeCasamento::all();
        return view('diversos.regimeCasamento.listar', compact('regimeCasamento'));
    }

    public function Criar()
    {
        return view('diversos.regimeCasamento.criar');
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        RegimeCasamento::create($request->except('_token'));
        return redirect()->route('diversos.regimeCasamento.listar');
    }

    public function Exibir($id)
    {
        $regimeCasamento = RegimeCasamento::find($id) ? RegimeCasamento::find($id) : null;

        if($regimeCasamento)
            return view('diversos.regimeCasamento.exibir', compact('regimeCasamento'));
        else
            return redirect()->route('diversos.regimeCasamento.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $regimeCasamento = RegimeCasamento::find($id);
        $regimeCasamento->update($request->except('_token'));
        return redirect()->route('diversos.regimeCasamento.listar');
    }

    public function Excluir($id)
    {
        RegimeCasamento::find($id)->delete();
        return redirect()->route('diversos.regimeCasamento.listar');
    }

}
