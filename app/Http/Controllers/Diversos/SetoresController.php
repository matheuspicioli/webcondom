<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\SetorRequest;
use WebCondom\Models\Diversos\Setor;

class SetoresController extends Controller
{
	private $setor;

	public function __construct(Setor $setor)
	{
		$this->setor = $setor;
	}

	public function Listar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Setores', 'url' => '']
        ]);
        $setores = Setor::all();
        return view('diversos.setores.listar', compact('setores', 'migalhas'));
    }

    public function Criar()
    {
        return view('diversos.setores.criar', compact('migalhas'));
    }

    public function Salvar(SetorRequest $request)
    {
        $this->setor->create($request->all());
        return redirect()->route('diversos.setores.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Setores', 'url' => route('diversos.setores.listar')],
            ['titulo' => 'Alterar setor', 'url' => '']
        ]);
        $setor = Setor::find($id) ? Setor::find($id) : null;

        if($setor)
            return view('diversos.setores.exibir', compact('setor', 'migalhas'));
        else
            return redirect()->route('diversos.setores.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $setor = Setor::find($id);
        $setor->update($request->all());
        return redirect()->route('diversos.setores.listar');
    }

    public function Excluir($id)
    {
        Setor::find($id)->delete();
        return redirect()->route('diversos.setores.listar');
    }
}
