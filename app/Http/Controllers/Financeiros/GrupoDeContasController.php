<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Financeiros\GrupoDeConta;

class GrupoDeContasController extends Controller
{
    public function Listar()
    {
        $grupos = GrupoDeConta::all();
        return view('financeiros.grupodecontas.listar', compact('grupos'));
    }

    public function Criar()
    {
        return view('financeiros.grupodecontas.criar');
    }

    public function Salvar(Request $request)
    {
        GrupoDeConta::create($request->all());
        return redirect()->route('financeiros.grupodecontas.listar');
    }

    public function Exibir($id)
    {
        $grupo = GrupoDeConta::find($id) ? GrupoDeConta::find($id) : null;

        if ($grupo) {
            return view('financeiros.grupodecontas.exibir', compact('grupo'));
        } else
            return redirect()->route('financeiros.grupodecontas.criar');
    }

    public function Alterar(Request $request, $id)
    {
        $grupo = GrupoDeConta::find($id);
        if($grupo){
            $grupo->update($request->all());
            return redirect()->route('financeiros.grupodecontas.listar');
        }
        return redirect()->route('financeiros.grupodecontas.listar');
    }

    public function Excluir($id)
    {
        $grupo = GrupoDeConta::find($id);
        if($grupo){
            $grupo->delete();
            return redirect()->route('condominios.condominios.listar');
        }
    }

}
