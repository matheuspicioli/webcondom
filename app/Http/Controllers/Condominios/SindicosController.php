<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\Sindico;

class SindicosController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Sindicos', 'url' => '']
        ]);
        $sindicos = Sindico::all();
        return view('condominios.sindicos.listar', compact('sindicos', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Sindicos', 'url' => route('condominios.sindicos.listar')],
            ['titulo' => 'Cadastrar síndico', 'url' => '']
        ]);
        return view('condominios.sindicos.criar', compact('migalhas'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        Sindico::create($request->except('_token'));
        return redirect()->route('condominios.sindicos.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Sindicos', 'url' => route('condominios.sindicos.listar')],
            ['titulo' => 'Alterar síndico', 'url' => '']
        ]);
        $sindico = Sindico::find($id) ? Sindico::find($id) : null;

        if($sindico){
            $condominios = Condominio::all();
            return view('condominios.sindicos.exibir', compact('sindico', 'condominios', 'migalhas'));
        }
        else
            return redirect()->route('condominios.sindicos.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        Sindico::find($id)->update($request->except('_token'));
        return redirect()->route('condominios.sindicos.listar');
    }

    public function Excluir($id)
    {
        Sindico::find($id)->delete();
        return redirect()->route('condominios.sindicos.listar');
    }
}
