<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Services\Financeiros\GrupoDeContasService;

class GrupoDeContasController extends Controller
{
    private $service;

    public function __construct(GrupoDeContasService $service)
    {
        $this->service  = $service;
    }

    public function Listar()
    {
        $grupos = $this->service->Listar();

        return view('financeiros.grupodecontas.listar', compact('grupos'));
    }

    public function Criar()
    {
        return view('financeiros.grupodecontas.criar');
    }

    public function Salvar(Request $request)
    {
        $grupo = $this->service->Salvar($request->all());
        return redirect()->route('financeiros.grupodecontas.listar');
    }

    public function Exibir($id)
    {
        $grupo = $this->service->Exibir($id);
        return view('financeiros.grupodecontas.exibir', compact('grupo'));
    }

    public function Alterar(Request $request, $id)
    {
        $grupo = $this->service->Alterar($request, $id);
        return redirect()->route('financeiros.grupodecontas.listar');
    }

    public function Excluir($id)
    {
        $grupo = $this->service->Excluir($id);
        return redirect()->route('financeiros.grupodecontas.listar');
    }

}
