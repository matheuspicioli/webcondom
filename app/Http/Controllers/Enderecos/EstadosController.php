<?php

namespace WebCondom\Http\Controllers\Enderecos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Enderecos\Estado;

class EstadosController extends Controller
{
    public function Listar()
    {
        $estados = Estado::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Estados', 'url' => '']
        ]);
        return view('enderecos.estados.listar', compact('estados', 'migalhas'));
    }

    public function Criar()
    {
        return view('enderecos.estados.criar');
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        Estado::create($request->except('_token'));
        return redirect()->route('enderecos.estados.listar');
    }

    public function Exibir($id)
    {
        $estado = Estado::find($id) ? Estado::find($id) : null;

        if($estado)
            return view('enderecos.estados.exibir', compact('estado'));
        else
            return redirect()->route('enderecos.estados.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $estado = Estado::find($id);
        $estado->update($request->except('_token'));
        return redirect()->route('enderecos.estados.listar');
    }

    public function Excluir($id)
    {
        Estado::find($id)->delete();
        return redirect()->route('enderecos.estados.listar');
    }
}
