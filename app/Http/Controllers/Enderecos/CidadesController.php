<?php

namespace WebCondom\Http\Controllers\Enderecos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Estado;

class CidadesController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Cidades', 'url' => '']
        ]);
        $cidades = Cidade::all();
        return view('enderecos.cidades.listar', compact('cidades','migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Cidades', 'url' => route('enderecos.cidades.listar')],
            ['titulo' => 'Cadastrar cidades', 'url' => '']
        ]);
        $estados = Estado::all();
        return view('enderecos.cidades.criar', compact('estados', 'migalhas'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        Cidade::create($request->all());
        return redirect()->route('enderecos.cidades.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Cidades', 'url' => route('enderecos.cidades.listar')],
            ['titulo' => 'Alterar cidade', 'url' => '']
        ]);
        $cidade = Cidade::find($id) ? Cidade::find($id) : null;

        if($cidade){
            $estados = Estado::all();
            return view('enderecos.cidades.exibir', compact('cidade', 'estados', 'migalhas'));
        }
        else
            return redirect()->route('enderecos.cidades.criar');
    }

    public function Alterar(Request $request, $id)
    {
        Cidade::find($id)->update($request->all());
        return redirect()->route('enderecos.cidades.exibir', ['id' => $id]);
    }

    public function Excluir($id)
    {
        Estado::find($id)->delete();
        return redirect()->route('enderecos.estados.listar');
    }
}
