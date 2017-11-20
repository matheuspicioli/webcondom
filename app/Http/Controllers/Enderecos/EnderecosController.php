<?php

namespace WebCondom\Http\Controllers\Enderecos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Endereco;

class EnderecosController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Endereços', 'url' => ''],
        ]);
        $enderecos = Endereco::all();
        return view('enderecos.enderecos.listar', compact('enderecos', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Endereços', 'url' => route('enderecos.enderecos.listar')],
            ['titulo' => 'Cadastrar endereço', 'url' => ''],
        ]);
        $cidades = Cidade::all();
        return view('enderecos.enderecos.criar', compact('cidades', 'migalhas'));
    }

    public function Salvar(Request $request)
    {
        Endereco::create($request->all());
        return redirect()->route('enderecos.enderecos.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Endereços', 'url' => route('enderecos.enderecos.listar')],
            ['titulo' => 'Alterar endereço', 'url' => ''],
        ]);
        $endereco = Endereco::find($id) ? Endereco::find($id) : null;

        if($endereco){
            $cidades = Cidade::all();
            return view('enderecos.enderecos.exibir', compact('endereco', 'cidades', 'migalhas'));
        }
        else
            return redirect()->route('enderecos.enderecos.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        Endereco::find($id)->update($request->all());
        return redirect()->route('enderecos.enderecos.exibir', ['id' => $id]);
    }

    public function Excluir($id)
    {
        Endereco::find($id)->delete();
        return redirect()->route('enderecos.enderecos.listar');
    }
}
