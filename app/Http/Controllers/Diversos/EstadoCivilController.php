<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\EstadoCivilRequest;
use WebCondom\Models\Diversos\EstadoCivil;

class EstadoCivilController extends Controller
{
    public function Listar()
    {
        $estadoCivil = EstadoCivil::all();
        return view('diversos.estadoCivil.listar', compact('estadoCivil'));
    }

    public function Criar()
    {
        return view('diversos.estadoCivil.formulario');
    }

    public function Salvar(EstadoCivilRequest $request)
    {
        //dd($request->except('_token'));
        EstadoCivil::create($request->all());
		Toast::success('Estado civil incluído com sucesso!', 'Inclusão!');
        return redirect()->route('diversos.estadoCivil.listar');
    }

    public function Exibir($id)
    {
        $estadoCivil = EstadoCivil::find($id) ? EstadoCivil::find($id) : null;

        if($estadoCivil)
            return view('diversos.estadoCivil.formulario', compact('estadoCivil'));
        else
            return redirect()->route('diversos.estadoCivil.formulario');
    }

    public function Alterar(EstadoCivilRequest $request, $id)
    {
        //dd($request->all());
        $estadoCivil = EstadoCivil::find($id);
        $estadoCivil->update($request->all());
		Toast::success('Estado civil alterado com sucesso!', 'Alteração!');
        return redirect()->route('diversos.estadoCivil.listar');
    }

    public function Excluir($id)
    {
        EstadoCivil::find($id)->delete();
		Toast::success('Estado civil excluído com sucesso!', 'Exclusão!');
        return redirect()->route('diversos.estadoCivil.listar');
    }
}
