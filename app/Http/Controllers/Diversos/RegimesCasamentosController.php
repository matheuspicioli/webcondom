<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\RegimeCasamentoRequest;
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

    public function Salvar(RegimeCasamentoRequest $request)
    {
        //dd($request->except('_token'));
        RegimeCasamento::create($request->all());
        Toast::success('Regime de casamento incluído com sucesso!','Inclusão!');
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

    public function Alterar(RegimeCasamentoRequest $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $regimeCasamento = RegimeCasamento::find($id);
        $regimeCasamento->update($request->all());
		Toast::success('Regime de casamento alterado com sucesso!','Alteração!');
        return redirect()->route('diversos.regimeCasamento.listar');
    }

    public function Excluir($id)
    {
        RegimeCasamento::find($id)->delete();
		Toast::success('Regime de casamento excluído com sucesso!','Exclusão!');
        return redirect()->route('diversos.regimeCasamento.listar');
    }

}
