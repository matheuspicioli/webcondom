<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\SetorRequest;
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
        $setores = Setor::all();
        return view('diversos.setores.listar', compact('setores'));
    }

    public function Criar()
    {
        return view('diversos.setores.formulario');
    }

    public function Salvar(SetorRequest $request)
    {
        $this->setor->create($request->all());
        Toast::success('Setor incluído com sucesso!','Inclusão!');
        return redirect()->route('diversos.setores.listar');
    }

    public function Exibir($id)
    {
        $setor = Setor::find($id) ? Setor::find($id) : null;

        if($setor)
            return view('diversos.setores.formulario', compact('setor'));
        else
            return redirect()->route('diversos.setores.formulario');
    }

    public function Alterar(SetorRequest $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $setor = Setor::find($id);
        $setor->update($request->all());
		Toast::success('Setor alterado com sucesso!','Alteração!');
        return redirect()->route('diversos.setores.listar');
    }

    public function Excluir($id)
    {
        Setor::find($id)->delete();
        Toast::success('Setor excluído com sucesso!','Exclusão!');
        return redirect()->route('diversos.setores.listar');
    }
}
