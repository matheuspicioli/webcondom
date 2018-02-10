<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/01/18
 * Time: 20:11
 */

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use WebCondom\Services\Financeiros\PlanoDeContasService;

class PlanoDeContasController
{
    private $service;

    public function __construct(PlanoDeContasService $service)
    {
        $this->service  = $service;
    }

    public function Listar()
    {
        $planos = $this->service->Listar()->dados;
        return view('financeiros.planodecontas.listar', compact('planos'));
    }

    public function Criar()
    {
        return view('financeiros.planodecontas.criar');
    }

    public function Salvar(Request $request)
    {
        $plano = $this->service->Salvar($request->all());
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Exibir($id)
    {
        $plano = $this->service->Exibir($id)->dados;
        return view('financeiros.planodecontas.exibir', compact('plano'));
    }

    public function Alterar(Request $request, $id)
    {
        $plano = $this->service->Alterar($request, $id);
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Excluir($id)
    {
        $plano = $this->service->Excluir($id);
        return redirect()->route('financeiros.planodecontas.listar');
    }
}