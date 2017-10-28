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
        $cidades = Cidade::all();
        return view('enderecos.cidades.listar', compact('cidades'));
    }

    public function Criar()
    {
        $estados = Estado::all();
        return view('enderecos.cidades.criar', compact('estados'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        Cidade::create($request->except('_token'));
        return redirect()->route('enderecos.cidades.listar');
    }

    public function Exibir($id)
    {
        $cidade = Cidade::find($id) ? Cidade::find($id) : null;

        if($cidade){
            $estados = Estado::all();
            return view('enderecos.cidades.exibir', compact('cidade', 'estados'));
        }
        else
            return redirect()->route('enderecos.cidades.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $cidade = Cidade::find($id);
        $cidade->update($request->except('_token'));
        return redirect()->route('enderecos.cidades.listar');
    }

    public function Excluir($id)
    {
        Estado::find($id)->delete();
        return redirect()->route('enderecos.estados.listar');
    }
}
