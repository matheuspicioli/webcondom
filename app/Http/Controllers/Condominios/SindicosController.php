<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Condominios\SindicoRequest;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\Sindico;

class SindicosController extends Controller
{
    public function Listar()
    {
        $sindicos = Sindico::all();
        return view('condominios.sindicos.listar', compact('sindicos'));
    }

    public function Criar()
    {
        return view('condominios.sindicos.formulario');
    }

    public function Salvar(SindicoRequest $request)
    {
        //dd($request->except('_token'));
        Sindico::create($request->all());
		Toast::success('Sindico incluído com sucesso!', 'Inclusão!');
        return redirect()->route('condominios.sindicos.listar');
    }

    public function Exibir($id)
    {
        $sindico = Sindico::find($id) ? Sindico::find($id) : null;

        if($sindico){
            $condominios = Condominio::all();
            return view('condominios.sindicos.formulario', compact('sindico', 'condominios'));
        }
        else
            return redirect()->route('condominios.sindicos.formulario');
    }

    public function Alterar(SindicoRequest $request, $id)
    {
        Sindico::find($id)->update($request->all());
		Toast::success('Sindico alterado com sucesso!', 'Alteração!');
        return redirect()->route('condominios.sindicos.listar');
    }

    public function Excluir($id)
    {
        Sindico::find($id)->delete();
		Toast::success('Sindico excluída com sucesso!', 'Exclusão!');
        return redirect()->route('condominios.sindicos.listar');
    }
}
