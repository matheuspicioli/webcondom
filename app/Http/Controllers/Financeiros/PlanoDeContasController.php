<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/01/18
 * Time: 20:11
 */

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use WebCondom\Services\Financeiros\PlanoDeContasService;

class PlanoDeContasController
{
    private $service;

    public function __construct(PlanoDeContasService $service)
    {
        $this->service  = $service;
    }

    public function Exportar($id, $tipo = 'xlsx')
    {
        $resultado = $this->service->Pesquisar($id);
        if($resultado->sucesso){
            Excel::create("Detalhes plano de contas ".$resultado->dados->descricao, function($excel) use($resultado) {
                $excel->setTitle($resultado->dados->descricao);
                $excel->setCreator('WebCondom')
                    ->setCompany('Emporium Digital');
                $excel->setDescription("Detalhes plano de contas ".$resultado->dados->descricao);

                $excel->sheet('Teste nome sheet', function($sheet) use($resultado) {
                    $sheet->cell('A1', function ($cell) {
                        $cell->setValue('Código');
                    });
                    $sheet->cell('A2', function ($cell) use ($resultado) {
                        $cell->setValue($resultado->dados->codigo);
                    });
                    $sheet->cell('B1', function ($cell) {
                        $cell->setValue('Ratear?');
                    });
                    $sheet->cell('B2', function ($cell) use ($resultado) {
                        $cell->setValue($resultado->dados->ratear);
                    });
                    $sheet->cell('C1', function ($cell) {
                        $cell->setValue('Descrição');
                    });
                    $sheet->cell('C2', function ($cell) use ($resultado) {
                        $cell->setValue($resultado->dados->descricao);
                    });
                });
                //XLSX, CVS
            })->download($tipo);
            return redirect()->route('financeiros.planodecontas.listar');
        }
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