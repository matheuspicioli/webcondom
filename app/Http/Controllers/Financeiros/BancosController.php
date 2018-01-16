<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Financeiros\Banco;

class BancosController extends Controller
{
    public function Listar()
    {
        $bancos = Banco::all();
        return view('financeiros.bancos.listar', compact('bancos'));
    }

    public function Criar()
    {
        return view('financeiros.bancos.criar');
    }

    public function Salvar(Request $request)
    {
        Banco::create($request->all());
        return redirect()->route('financeiros.bancos.listar');
    }

    public function Exibir($id)
    {
        $banco = Banco::find($id) ? Banco::find($id) : null;

        if ($banco) {
            return view('financeiros.bancos.exibir', compact('banco'));
        } else
            return redirect()->route('financeiros.bancos.criar');
    }

    public function Alterar(Request $request, $id)
    {
        $banco = Banco::find($id);
        if($banco){
            $banco->update($request->all());
            return redirect()->route('financeiros.bancos.listar');
        }
        return redirect()->route('financeiros.bancos.listar');
    }

    public function Excluir($id)
    {
        $banco = Banco::find($id);
        if($banco){
            $banco->delete();
            return redirect()->route('financeiros.bancos.listar');
        }
    }
}