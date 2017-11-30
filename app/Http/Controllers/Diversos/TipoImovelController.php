<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Diversos\TipoImovel;

class TipoImovelController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Tipos imoveis', 'url' => '']
        ]);
        $tiposImoveis = TipoImovel::all();
        return view('diversos.tiposimoveis.listar', compact('tiposImoveis', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Tipos imoveis', 'url' => route('diversos.tiposimoveis.listar')],
            ['titulo' => 'Cadastrar tipo imovel', 'url' => '']
        ]);
        return view('diversos.tiposimoveis.criar', compact('migalhas'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        TipoImovel::create($request->all());
        return redirect()->route('diversos.tiposimoveis.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Tipos imoveis', 'url' => route('diversos.tiposimoveis.listar')],
            ['titulo' => 'Alterar tipo imovel', 'url' => '']
        ]);
        $tipoImovel = TipoImovel::find($id) ? TipoImovel::find($id) : null;

        if($tipoImovel)
            return view('diversos.tiposimoveis.exibir', compact('tipoImovel', 'migalhas'));
        else
            return redirect()->route('diversos.tiposimoveis.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $tipoImovel = TipoImovel::find($id);
        $tipoImovel->update($request->all());
        return redirect()->route('diversos.tiposimoveis.listar');
    }

    public function Excluir($id)
    {
        TipoImovel::find($id)->delete();
        return redirect()->route('diversos.tiposimoveis.listar');
    }
}
