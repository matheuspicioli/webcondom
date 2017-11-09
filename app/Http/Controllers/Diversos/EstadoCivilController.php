<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
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
        return view('diversos.estadoCivil.criar');
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        EstadoCivil::create($request->except('_token'));
        return redirect()->route('diversos.estadoCivil.listar');
    }

    public function Exibir($id)
    {
        $estadoCivil = EstadoCivil::find($id) ? EstadoCivil::find($id) : null;

        if($estadoCivil)
            return view('diversos.estadoCivil.exibir', compact('estadoCivil'));
        else
            return redirect()->route('diversos.estadoCivil.criar');
    }

    public function Alterar(Request $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $estadoCivil = EstadoCivil::find($id);
        $estadoCivil->update($request->except('_token'));
        return redirect()->route('diversos.estadoCivil.listar');
    }

    public function Excluir($id)
    {
        EstadoCivil::find($id)->delete();
        return redirect()->route('diversos.estadoCivil.listar');
    }
}
