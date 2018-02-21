<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Financeiros\Conta;
use WebCondom\Models\Financeiros\Grupo;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Models\Financeiros\Tipo;

class PlanoDeContasController extends Controller
{
    private $plano;
    private $tipo;
    private $grupo;
    private $conta;

    public function __construct(PlanoDeConta $plano, Tipo $tipo, Grupo $grupo, Conta $conta)
    {
        $this->plano = $plano;
        $this->tipo = $tipo;
        $this->grupo = $grupo;
        $this->conta = $conta;
    }

    public function Listar()
    {
        $planos = $this->plano->all();
        $tipos = $this->tipo->all();
        return view('financeiros.planodecontas.listar', compact('planos', 'tipos'));
    }

    public function Criar()
    {
        return view('financeiros.planodecontas.criar');
    }

    public function Salvar(Request $request)
    {
        $grupo = $this->grupo->where('grupo', $request->grupo)->first();
        if ($grupo) {
            if($request->conta){
                $conta = $this->conta->create([
                    'conta'     => $request->conta,
                    'grupo_id'  => $grupo->id
                ]);
            }
        } else {
            $grupo = $this->grupo->create([
                'grupo'     => $request->grupo,
                'tipo_id'   => $request->tipo_id
            ]);
            $conta = $this->conta->create([
                'conta'     => $request->conta,
                'grupo_id'  => $grupo->id
            ]);
        }
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Exibir($id)
    {
        $plano = $this->plano->find($id);
        if ($plano)
            return view('financeiros.planodecontas.exibir', compact('plano'));

        return view('financeiros.planodecontas.listar');
    }

    public function Alterar(Request $request, $id)
    {
        $plano = $this->plano->find($id);
        if ($plano) {
            $novo_plano = $plano->update($request);
            return redirect()->route('financeiros.planodecontas.listar');
        }
    }

    public function Excluir($id)
    {
        $plano = $this->plano->find($id);
        if ($plano) {
            $plano->delete();
            return redirect()->route('financeiros.planodecontas.listar');
        }
    }

}
