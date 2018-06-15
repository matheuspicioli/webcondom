<?php

namespace WebCondom\Http\Controllers\Enderecos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Enderecos\EstadosRequest;
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
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Estados', 'url' => route('enderecos.estados.listar')],
            ['titulo' => 'Cadastrar estado', 'url' => '']
        ]);
        return view('enderecos.estados.criar', compact('migalhas'));
    }

    public function Salvar(EstadosRequest $request)
    {
        Estado::create($request->all());
        return redirect()->route('enderecos.estados.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Estados', 'url' => route('enderecos.estados.listar')],
            ['titulo' => 'Alterar estado', 'url' => '']
        ]);
        $estado = Estado::find($id) ? Estado::find($id) : null;

        if($estado)
            return view('enderecos.estados.exibir', compact('estado'));
        else
            return redirect()->route('enderecos.estados.criar');
    }

    public function Alterar(Request $request, $id)
    {
        Estado::find($id)->update($request->all());
        return redirect()->route('enderecos.estados.listar');
    }
}
