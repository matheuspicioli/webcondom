<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Diversos\Departamento;

class DepartamentosController extends Controller
{
    public function Listar()
    {
        $departamento = Departamento::all();
        return view('diversos.departamento.listar', compact('departamento'));
    }

    public function Criar()
    {
        return view('diversos.departamento.criar');
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        Departamento::create($request->except('_token'));
        return redirect()->route('diversos.departamento.listar');
    }

    public function Exibir($id)
    {
        $departamento = Departamento::find($id) ? Departamento::find($id) : null;

        if($departamento)
            return view('diversos.departamento.exibir', compact('departamento'));
        else
            return redirect()->route('diversos.departamento.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $departamento = Departamento::find($id);
        $departamento->update($request->except('_token'));
        return redirect()->route('diversos.departamento.listar');
    }

    public function Excluir($id)
    {
        Departamento::find($id)->delete();
        return redirect()->route('diversos.departamento.listar');
    }
}
