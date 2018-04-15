<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\EstadoCivilRequest;
use WebCondom\Models\Diversos\EstadoCivil;

class EstadoCivilController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Estado civil', 'url' => '']
        ]);
        $estadoCivil = EstadoCivil::all();
        return view('diversos.estadoCivil.listar', compact('estadoCivil', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Estado civil', 'url' => route('diversos.estadoCivil.listar')],
            ['titulo' => 'Cadastrar estado cívil', 'url' => '']
        ]);
        return view('diversos.estadoCivil.criar', compact('migalhas'));
    }

    public function Salvar(EstadoCivilRequest $request)
    {
        //dd($request->except('_token'));
        EstadoCivil::create($request->all());
		Toast::success('Estado civil incluído com sucesso!', 'Inclusão!');
        return redirect()->route('diversos.estadoCivil.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Estado civil', 'url' => route('diversos.estadoCivil.listar')],
            ['titulo' => 'Alterar estado cívil', 'url' => '']
        ]);
        $estadoCivil = EstadoCivil::find($id) ? EstadoCivil::find($id) : null;

        if($estadoCivil)
            return view('diversos.estadoCivil.exibir', compact('estadoCivil', 'migalhas'));
        else
            return redirect()->route('diversos.estadoCivil.criar');
    }

    public function Alterar(EstadoCivilRequest $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $estadoCivil = EstadoCivil::find($id);
        $estadoCivil->update($request->all());
		Toast::success('Estado civil alterado com sucesso!', 'Alteração!');
        return redirect()->route('diversos.estadoCivil.listar');
    }

    public function Excluir($id)
    {
        EstadoCivil::find($id)->delete();
		Toast::error('Estado civil excluído com sucesso!', 'Exclusão!');
        return redirect()->route('diversos.estadoCivil.listar');
    }
}
