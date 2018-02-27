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

    public function FormatarProximaConta($conta)
    {
        if($conta < 10)
            return '000'.($conta+1);
        else if($conta < 100)
            return '00'.($conta+1);
        else if($conta < 1000)
            return '0'.($conta+1);
        else
            return $conta+1;
    }

    public function FormatarProximoGrupo($grupo){
        if($grupo < 10)
            return '00'.($grupo+1);
        else if($grupo < 100)
            return '0'.($grupo+1);
        else
            return $grupo+1;
    }

    public function Salvar(Request $request)
    {
        if($request->grupo != null && $request->conta == null){
            $tipo           = $this->tipo->find($request->tipo_id);
            $grupo_tipo     = $tipo->grupos()->where('grupo', $request->grupo)->first();
            if($grupo_tipo){
                $ultima_conta   = (int)$grupo_tipo->contas()->orderBy('conta', 'DESC')->first();
                if($ultima_conta){
                    $ultima_conta   = $ultima_conta->conta;
                    $proxima_conta  = $this->FormatarProximaConta($ultima_conta);
                    $this->conta->create([
                        'conta'     => $proxima_conta,
                        'descricao' => $request->descricao_conta,
                        'grupo_id'  => $grupo_tipo->id
                    ]);
                }
                //SÓ VAI ENTRAR SE
                //FOR A PRIMEIRA CONTA
                else {
                    $this->conta->create([
                        'conta'     => '0001',
                        'descricao' => $request->descricao_conta,
                        'grupo_id'  => $grupo_tipo->id
                    ]);
                }
            }
        } else if($request->grupo == null && $request->exists('tipo_id')) {
            $tipo           = $this->tipo->find($request->tipo_id);
            $ultimo_grupo     = $tipo->grupos()->orderBy('grupo', 'DESC')->first();
            if($ultimo_grupo){
                $ultimo_grupo = $ultimo_grupo->grupo;
                $proximo_grupo  = $this->FormatarProximoGrupo($ultimo_grupo);
                $grupo = $this->grupo->create([
                    'grupo'     => $proximo_grupo,
                    'ratear'    => $request->ratear,
                    'descricao' => $request->descricao_grupo,
                    'tipo_id'   => $tipo->id
                ]);
            }
            //SÓ VAI ENTRAR SE
            //FOR O PRIMEIRO GRUPO
            else {
                $grupo = $this->grupo->create([
                    'grupo'     => '001',
                    'ratear'    => $request->ratear,
                    'descricao' => $request->descricao_grupo,
                    'tipo_id'   => $tipo->id
                ]);
            }
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

    public function Alterar(Request $request, $tipo, $grupo, $conta)
    {
        if($request->exists('tipo')){
            $tipo_objeto = $this->tipo->find($tipo);
            $tipo_objeto->update($request->all());
        }
        if($request->exists('grupo')){
            $grupo_objeto = $this->grupo->find($grupo);
            if($request->tipo_id){
                $grupo_objeto->update([
                    'grupo'     => $request->grupo,
                    'ratear'    => $request->ratear,
                    'descricao' => $request->descricao_grupo,
                    'tipo_id'   => $request->tipo_id
                ]);
            } else {
                $grupo_objeto->update([
                    'grupo'     => $request->grupo,
                    'ratear'    => $request->ratear,
                    'descricao' => $request->descricao_grupo
                ]);
            }
        }
        if($request->exists('conta')){
            $conta_objeto = $this->conta->find($conta);
            $conta_objeto->update([
                'conta'     => $request->conta,
                'descricao' => $request->descricao_conta
            ]);
        }
        return redirect()->route('financeiros.planodecontas.listar');
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
