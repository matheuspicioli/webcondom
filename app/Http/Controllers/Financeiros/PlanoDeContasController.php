<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Financeiros\PlanoDeContaRequest;
use WebCondom\Models\Financeiros\Conta;
use WebCondom\Models\Financeiros\Grupo;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Models\Financeiros\Tipo;
use WebCondom\Traits\Financeiros\PlanoDeContas;

class PlanoDeContasController extends Controller
{
    use PlanoDeContas;

    private $plano;
    private $grupo;
    private $conta;

    public function __construct(PlanoDeConta $plano, Grupo $grupo, Conta $conta)
    {
        $this->plano = $plano;
        $this->grupo = $grupo;
        $this->conta = $conta;
    }

    public function ProximaConta($plano, $grupo)
    {
        $plano = $this->plano->find($plano);
        $grupo_tipo = $plano->grupos()->where('grupo', $grupo)->first();
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

    public function ProximoGrupo($plano)
    {
        $plano = $this->plano->find($plano);
        $ultimo_grupo = $plano->grupos()->orderBy('grupo', 'DESC')->first();
        if ($ultimo_grupo) {
            $proximo_grupo = (int)$ultimo_grupo->grupo + 1;
            if ($proximo_grupo < 10) $proximo_grupo = '00' . $proximo_grupo;
            elseif ($proximo_grupo < 100) $proximo_grupo = '0' . $proximo_grupo;
            return $proximo_grupo;
        }
    }

    public function Listar()
    {
        $grupos = $this->grupo->all();
        $planos = $this->plano->all();
        $contas = $this->conta->all();
        return view('financeiros.planodecontas.listar', compact('grupos', 'planos', 'contas'));
    }

    public function Criar()
    {
        return view('financeiros.planodecontas.criar');
    }

    public function Salvar(PlanoDeContaRequest $request)
    {
        //dd($request->all());
        if($request->grupo != null && $request->conta == null){
            $plano          = $this->plano->find($request->plano_id);
            $grupo_tipo     = $plano->grupos()->where('grupo', $request->grupo)->first();
            if($grupo_tipo){
                $ultima_conta   = $grupo_tipo->contas()->orderBy('conta', 'DESC')->first();
                if($ultima_conta){
                    $ultima_conta   = (int)$ultima_conta->conta;
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
        } else if($request->grupo == null && $request->exists('plano_id')) {
            $plano            = $this->plano->find($request->plano_id);
            $ultimo_grupo     = $plano->grupos()->orderBy('grupo', 'DESC')->first();
            if($ultimo_grupo){
                $ultimo_grupo   = (int)$ultimo_grupo->grupo;
                $proximo_grupo  = $this->FormatarProximoGrupo($ultimo_grupo);
                $grupo = $this->grupo->create([
                    'grupo'             => $proximo_grupo,
                    'ratear'            => $request->ratear,
                    'descricao'         => $request->descricao_grupo,
                    'plano_de_conta_id' => $plano->id
                ]);
            }
            //SÓ VAI ENTRAR SE
            //FOR O PRIMEIRO GRUPO
            else {
                $grupo = $this->grupo->create([
                    'grupo'                 => '001',
                    'ratear'                => $request->ratear,
                    'descricao'             => $request->descricao_grupo,
                    'plano_de_conta_id'     => $plano->id
                ]);
            }
        }
        Toast::success('Plano De Conta incluído com sucesso!','Inclusão!');
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function Exibir($plano, $grupo, $conta)
    {
        $plano  = $this->plano->find($plano);
        $planos = $this->plano->all();
        $grupo  = $this->grupo->find($grupo);
        $conta  = $this->conta->find($conta);

        if ($plano && $grupo && $conta)

            return view('financeiros.planodecontas.exibir', compact('plano', 'grupo', 'conta', 'planos'));

        return view('financeiros.planodecontas.listar');
    }

    public function ExibirGrupo($plano, $grupo)
    {
        $plano  = $this->plano->find($plano);
        $planos = $this->plano->all();
        $grupo  = $this->grupo->find($grupo);

        if ($plano && $grupo)
            return view('financeiros.planodecontas.exibirgrupo', compact('plano', 'grupo', 'planos'));

        return view('financeiros.planodecontas.listar');
    }

    public function Alterar(PlanoDeContaRequest $request, $plano, $grupo, $conta = null)
    {
        //dd($request->all());
        if($request->exists('plano')){
            $plano_objeto = $this->plano->find($plano);
            $plano_objeto->update($request->all());
        }
        if($request->exists('grupo')){
            $grupo_objeto = $this->grupo->find($grupo);
            if($request->plano_id){
                $grupo_objeto->update([
                    'grupo'             => $request->grupo,
                    'ratear'            => $request->ratear,
                    'descricao'         => $request->descricao_grupo,
                    'plano_de_conta_id' => $request->plano_id
                ]);
            } else {
                $grupo_objeto->update([
                    'grupo'     => $request->grupo,
                    'ratear'    => $request->ratear,
                    'descricao' => $request->descricao_grupo
                ]);
            }
        }
        if($request->get('conta') != null){
            $conta_objeto = $this->conta->find($conta);
            $conta_objeto->update([
                'conta'     => $request->conta,
                'descricao' => $request->descricao_conta
            ]);
        }
        Toast::success('Plano De Conta alterado com sucesso!','Alteração!');
        return redirect()->route('financeiros.planodecontas.listar');
    }

    public function ExcluirGrupo($id)
    {
        $grupo = $this->grupo->find($id);
        if ($grupo) {
            $grupo->delete();
            Toast::success('Grupo excluído com sucesso!','Exclusão!');
            return redirect()->route('financeiros.planodecontas.listar');
        }
    }

    public function ExcluirConta($id)
    {
        $conta = $this->conta->find($id);
        if ($conta) {
            $conta->delete();
            Toast::success('Plano De Conta excluído com sucesso!','Exclusão!');
            return redirect()->route('financeiros.planodecontas.listar');
        }
    }

}
