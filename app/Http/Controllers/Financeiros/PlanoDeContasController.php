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

    public function ProximaConta($tipo, $grupo)
    {
        $tipo = $this->tipo->find($tipo);
        $grupo_tipo = $tipo->grupos()->where('grupo', $grupo)->first();
        if ($grupo_tipo) {
            $ultima_conta = $grupo_tipo->contas()->orderBy('conta', 'DESC')->first();
            if ($ultima_conta) {
                $proxima_conta = (int)$grupo_tipo->contas()->orderBy('conta', 'DESC')->first()->conta + 1;
                if ($proxima_conta < 10) $proxima_conta = '000' . $proxima_conta;
                else if ($proxima_conta < 100) $proxima_conta = '00' . $proxima_conta;
                else if ($proxima_conta < 1000) $proxima_conta = '0' . $proxima_conta;
                //return "Tipo: $tipo->descricao, Grupo: $grupo_tipo->descricao, Última conta: $ultima_conta->conta, Próx. conta: $proxima_conta";
                return $proxima_conta;
            }
        }
    }

    public function ProximoGrupo($tipo)
    {
        $tipo = $this->tipo->find($tipo);
        $ultimo_grupo = $tipo->grupos()->orderBy('grupo', 'DESC')->first();
        if ($ultimo_grupo) {
            $proximo_grupo = (int)$ultimo_grupo->grupo + 1;
            if ($proximo_grupo < 10) $proximo_grupo = '00' . $proximo_grupo;
            elseif ($proximo_grupo < 100) $proximo_grupo = '0' . $proximo_grupo;
            return $proximo_grupo;
        }
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
        //SE EXISTIR UM GRUPO IDENTICO
        //AO QUE O USUARIO DIGITOU
        //ELE NÃO VAI CRIAR OUTRO GRUPO
        $tipo = $this->tipo->find($request->tipo_id);
        $grupo_tipo = $tipo->grupos()->where('grupo', $request->grupo)->first();
        //dd($request->conta);
        if ($grupo_tipo) {
            if ($request->conta) {
                $conta = $this->conta->create([
                    'conta' => $request->conta,
                    'descricao' => $request->descricao_conta,
                    'grupo_id' => $grupo_tipo->id
                ]);
            }
        } else {
            $grupo = $this->grupo->create([
                'grupo' => $request->grupo,
                'ratear' => $request->ratear,
                'descricao' => $request->descricao_grupo,
                'tipo_id' => $request->tipo_id
            ]);
            //if($request->conta) {
            $conta = $this->conta->create([
                'conta' => $request->conta,
                'descricao' => $request->descricao_conta,
                'grupo_id' => $grupo->id
            ]);
            //}
        }
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Exibir($tipo, $grupo, $conta)
    {
        $tipo = $this->tipo->find($tipo);
        $tipos = $this->tipo->all();
        $grupo = $this->grupo->find($grupo);
        $conta = $this->conta->find($conta);

        if ($tipo && $grupo && $conta)
            return view('financeiros.planodecontas.exibir', compact('tipo', 'grupo', 'conta', 'tipos'));

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

    public function ExcluirGrupo($id)
    {
        $grupo = $this->grupo->find($id);
        if ($grupo) {
            $grupo->delete();
            return redirect()->route('financeiros.planodecontas.listar');
        }
    }

    public function ExcluirConta($id)
    {
        $conta = $this->conta->find($id);
        if ($conta) {
            $conta->delete();
            return redirect()->route('financeiros.planodecontas.listar');
        }
    }

}
