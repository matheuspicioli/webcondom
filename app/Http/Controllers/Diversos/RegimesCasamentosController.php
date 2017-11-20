<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Diversos\RegimeCasamento;

class RegimesCasamentosController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Regimes de casamento', 'url' => '']
        ]);
        $regimeCasamento = RegimeCasamento::all();
        return view('diversos.regimeCasamento.listar', compact('regimeCasamento', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Regimes de casamento', 'url' => route('diversos.regimeCasamento.listar')],
            ['titulo' => 'Cadastrar regimes de casamento', 'url' => '']
        ]);
        return view('diversos.regimeCasamento.criar', compact('migalhas'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        RegimeCasamento::create($request->except('_token'));
        return redirect()->route('diversos.regimeCasamento.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Regimes de casamento', 'url' => route('diversos.regimeCasamento.listar')],
            ['titulo' => 'Alterar regimes de casamento', 'url' => '']
        ]);
        $regimeCasamento = RegimeCasamento::find($id) ? RegimeCasamento::find($id) : null;

        if($regimeCasamento)
            return view('diversos.regimeCasamento.exibir', compact('regimeCasamento', 'migalhas'));
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
