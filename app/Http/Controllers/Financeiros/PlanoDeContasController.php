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

    public function ProximaConta($grupo)
    {
        return $this->service->ProximaConta($grupo);
    }

    public function Exportar($tipo = 'xlsx')
    {
        $resultado = $this->service->Listar()->dados;
        $sucesso = $this->service->Listar()->sucesso;
        if($sucesso){
            Excel::create("Plano de contas", function($excel) use($resultado) {
                //$excel->setTitle($resultado->dados->descricao);
                $excel->setCreator('WebCondom')
                    ->setCompany('Emporium Digital');
                $excel->setDescription("Lista de plano de contas");

                $excel->sheet('Teste nome sheet', function($sheet) use($resultado) {
                    $sheet->cell('A1', function ($cell) {
                        $cell->setValue('Código');
                    });
                    $sheet->cell('B1', function ($cell) {
                        $cell->setValue('Ratear?');
                    });
                    $sheet->cell('C1', function ($cell) {
                        $cell->setValue('Descrição');
                    });
                    $contador = 1;
                    foreach($resultado as $dado)
                    {
                        $contador++;
                        $sheet->cell("A$contador", function ($cell) use ($dado) {
                            $cell->setValue($dado->codigo);
                        });
                        $sheet->cell("B$contador", function ($cell) use ($dado) {
                            $cell->setValue($dado->ratear);
                        });
                        $sheet->cell("C$contador", function ($cell) use ($dado) {
                            $cell->setValue($dado->descricao);
                        });
                    }
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
        $plano = $this->service->Salvar($request);
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Exibir($plano, $grupo, $conta)
    {
        $dados = $this->service->Exibir($plano, $grupo, $conta)->dados;
        return view('financeiros.planodecontas.exibir', compact('dados'));
    }

    public function Alterar(Request $request, $plano, $grupo, $conta)
    {
        $plano = $this->service->Alterar($request, $plano, $grupo, $conta);
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Excluir($id)
    {
        $plano = $this->service->Excluir($id);
        return redirect()->route('financeiros.planodecontas.listar');
    }
}