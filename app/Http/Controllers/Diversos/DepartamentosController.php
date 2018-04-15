<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\DepartamentoRequest;
use WebCondom\Models\Diversos\Departamento;

class DepartamentosController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Departamentos', 'url' => '']
        ]);
        $departamento = Departamento::all();
        return view('diversos.departamento.listar', compact('departamento', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Departamentos', 'url' => route('diversos.departamento.listar')],
            ['titulo' => 'Cadastrar departamento', 'url' => '']
        ]);
        return view('diversos.departamento.criar', compact('migalhas'));
    }

    public function Salvar(DepartamentoRequest $request)
    {
        //dd($request->except('_token'));
        Departamento::create($request->all());
		Toast::success('Departamento incluído com sucesso!', 'Inclusão!');
        return redirect()->route('diversos.departamento.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Departamentos', 'url' => route('diversos.departamento.listar')],
            ['titulo' => 'Alterar departamento', 'url' => '']
        ]);
        $departamento = Departamento::find($id) ? Departamento::find($id) : null;

        if($departamento)
            return view('diversos.departamento.exibir', compact('departamento', 'migalhas'));
        else
            return redirect()->route('diversos.departamento.criar');
    }

    public function Alterar(DepartamentoRequest $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $departamento = Departamento::find($id);
        $departamento->update($request->all());
		Toast::success('Departamento alterado com sucesso!', 'Alteração!');
        return redirect()->route('diversos.departamento.listar');
    }

    public function Excluir($id)
    {
        Departamento::find($id)->delete();
		Toast::error('Departamento excluído com sucesso!', 'Exclusão!');
        return redirect()->route('diversos.departamento.listar');
    }
}
