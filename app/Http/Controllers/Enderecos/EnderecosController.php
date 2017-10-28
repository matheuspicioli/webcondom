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
        $enderecos = Endereco::all();
        return view('enderecos.enderecos.listar', compact('enderecos'));
    }

    public function Criar()
    {
        $cidades = Cidade::all();
        return view('enderecos.enderecos.criar', compact('cidades'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        Endereco::create($request->except('_token'));
        return redirect()->route('enderecos.enderecos.listar');
    }

    public function Exibir($id)
    {
        $endereco = Endereco::find($id) ? Endereco::find($id) : null;

        if($endereco){
            $cidades = Cidade::all();
            return view('enderecos.enderecos.exibir', compact('endereco', 'cidades'));
        }
        else
            return redirect()->route('enderecos.enderecos.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        Endereco::find($id)->update($request->except('_token'));
        return redirect()->route('enderecos.enderecos.listar');
    }

    public function Excluir($id)
    {
        Endereco::find($id)->delete();
        return redirect()->route('enderecos.enderecos.listar');
    }
}
