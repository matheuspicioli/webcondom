<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Financeiros\ContaCorrenteRequest;
use WebCondom\Services\Condominios\CondominiosService;
use WebCondom\Services\Financeiros\BancosService;
use WebCondom\Services\Financeiros\ContasCorrenteService;

class ContasCorrenteController extends Controller
{
    private $service;
    private $condominiosService;
    private $bancosService;

    public function __construct(ContasCorrenteService $service, CondominiosService $condominiosService, BancosService $bancosService)
    {
        $this->service              = $service;
        $this->condominiosService   = $condominiosService;
        $this->bancosService        = $bancosService;
    }

    public function Listar()
    {
        $contas = $this->service->Listar();

        return view('financeiros.contascorrente.listar', compact('contas'));
    }

    public function Criar()
    {
        $bancos             = $this->bancosService->Listar();
        $bancosDados        = $bancos->dados;

        $condominios        = $this->condominiosService->Listar();
        $condominiosDados   = $condominios->dados;

        return view('financeiros.contascorrente.criar', compact('bancosDados', 'condominiosDados'));
    }

    public function Salvar(ContaCorrenteRequest $request)
    {
        $conta = $this->service->Salvar($request->all());
        Toast::success('Conta Corrente incluído com sucesso!','Inclusão!');
        return redirect()->route('financeiros.contascorrente.listar');
    }

    public function Exibir($id)
    {
        $conta              = $this->service->Exibir($id);
        $bancos             = $this->bancosService->Listar();
        $bancosDados        = $bancos->dados;
        $bancoAtual         = $this->bancosService->Exibir($conta->dados->banco_id);

        $condominios        = $this->condominiosService->Listar();
        $condominiosDados   = $condominios->dados;
        return view('financeiros.contascorrente.exibir', compact('conta', 'bancosDados', 'condominiosDados','bancoAtual'));
    }

    public function Alterar(ContaCorrenteRequest $request, $id)
    {
        $conta = $this->service->Alterar($request, $id);
        Toast::success('Conta Corrente alterado com sucesso!','Inclusão!');
        return redirect()->route('financeiros.contascorrente.listar');
    }

    public function Excluir($id)
    {
        $conta = $this->service->Excluir($id);
        Toast::success('Conta Corrente excluído com sucesso!','Exclusão!');
        return redirect()->route('financeiros.contascorrente.listar');
    }

}
