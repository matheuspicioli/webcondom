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
        return view('diversos.departamento.formulario');
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
        $departamento = Departamento::find($id) ? Departamento::find($id) : null;

        if($departamento)
            return view('diversos.departamento.formulario', compact('departamento'));
        else
            return redirect()->route('diversos.departamento.formulario');
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
		Toast::success('Departamento excluído com sucesso!', 'Exclusão!');
        return redirect()->route('diversos.departamento.listar');
    }
}
