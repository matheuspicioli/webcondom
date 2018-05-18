<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\CategoriaRequest;
use WebCondom\Models\Diversos\Categoria;

class CategoriasController extends Controller
{
    public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Categorias', 'url' => '']
        ]);
        $categorias = Categoria::all();
        return view('diversos.categorias.listar', compact('categorias', 'migalhas'));
    }

    public function Criar()
    {
        return view('diversos.categorias.formulario');
    }

    public function Salvar(CategoriaRequest $request)
    {
        //dd($request->except('_token'));
        Categoria::create($request->all());
        Toast::success('Categoria incluída com sucesso!', 'Inclusão!');
        return redirect()->route('diversos.categorias.listar');
    }

    public function Exibir($id)
    {
        $categoria = Categoria::find($id) ? Categoria::find($id) : null;

        if($categoria)
            return view('diversos.categorias.formulario', compact('categoria'));
        else
            return redirect()->route('diversos.categorias.criar');
    }

    public function Alterar(CategoriaRequest $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
		Toast::success('Categoria alterada com sucesso!', 'Alteração!');
        return redirect()->route('diversos.categorias.listar');
    }

    public function Excluir($id)
    {
        Categoria::find($id)->delete();
		Toast::success('Categoria excluída com sucesso!', 'Exclusão!');
        return redirect()->route('diversos.categorias.listar');
    }
}
