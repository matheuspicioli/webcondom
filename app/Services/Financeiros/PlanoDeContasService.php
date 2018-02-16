<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/01/18
 * Time: 20:09
 */

namespace WebCondom\Services\Financeiros;

use Illuminate\Support\Facades\Response;
use WebCondom\Models\Financeiros\Conta;
use WebCondom\Models\Financeiros\Grupo;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Repositories\Financeiros\PlanoDeContasRepository;

class PlanoDeContasService
{
    private $repository;

    public function __construct(PlanoDeContasRepository $repository)
    {
        $this->repository = $repository;
    }

    public function ProximaConta($grupo)
    {
        $grupo = Grupo::where('grupo', $grupo)->first();
        if($grupo){
            $ultima_conta_grupo = $grupo->contas()
                ->orderBy('conta', 'DESC')
                ->toSql();
            return $ultima_conta_grupo;
            if($ultima_conta_grupo){
                return (int)$ultima_conta_grupo->conta;
                $proxima_conta = (int)$ultima_conta_grupo->conta+1;
                return Response::json([
                    'sucesso'       => true,
                    'proxima-conta' => $proxima_conta,
                    'mensagem'      => 'Consulta realizada com sucesso'
                ],200);
            } else {
                return Response::json([
                    'sucesso'       => false,
                    'mensagem'      => 'Nenhuma conta cadastrada nesse grupo'
                ],200);
            }
        } else {
            return Response::json([
                'sucesso'       => false,
                'mensagem'      => 'Nenhum grupo correspondente'
            ],200);
        }
    }

    public function Listar()
    {
        $planos = $this->repository->all();
        if ($planos) {
            return (object)[
                'sucesso' => true,
                'dados' => $planos,
                'mensagem' => null
            ];
        }

        return (object)[
            'sucesso' => false,
            'dados' => null,
            'mensagem' => 'Não foi possível trazer os dados'
        ];
    }

    public function Salvar($request)
    {
        $plano = $this->repository->create($request->all());

        if ($plano) {
            $grupo = Grupo::create([
                'grupo'                 => $request->grupo,
                'plano_de_conta_id'     => $plano->id
            ]);
            if($grupo){
                $conta = Conta::create([
                    'conta'     => is_null($request->conta) ? '0000' : $request->conta,
                    'grupo_id'  => $grupo->id
                ]);
                return (object)[
                    'sucesso' => true,
                    'dados' => (object)[$plano, $conta, $grupo],
                    'mensagem' => 'Inclusão de registro efetuado com sucesso!'
                ];
            }
        }

        return (object)[
            'sucesso' => false,
            'dados' => null,
            'mensagem' => "Ocorreu um erro ao incluir registro!"
        ];
    }

    public function Exibir($id)
    {
        $plano = $this->repository->find($id);

        if ($plano)
            return (object)[
                'sucesso' => true,
                'dados' => $plano,
                'mensagem' => "Registro encontrado."
            ];

        return (object)[
            'sucesso' => false,
            'dados' => null,
            'mensagem' => "Ocorreu um erro ao encontrar o registro."
        ];
    }

    public function Alterar($request, $id)
    {
        $plano = $this->repository->find($id);
        if ($plano) {
            $alterar = $this->repository->update($request->all());
            $grupo = Conta::update([
                'grupo'       => $request->grupo
            ]);
            $conta = Conta::update([
                'conta'     => is_null($request->conta) ? '0000' : $request->conta
            ]);
            if ($alterar && $conta && $grupo) {
                return (object)[
                    'sucesso' => true,
                    'dados' => (object)[$plano, $conta, $grupo],
                    'mensagem' => "Registro alterado com sucesso!"
                ];
            } else {
                return (object)[
                    'sucesso' => false,
                    'dados' => null,
                    'mensagem' => "Ocorreu um erro ao encontrar o registro para alteração!"
                ];
            }
        }

        return (object)[
            'sucesso' => false,
            'dados' => null,
            'mensagem' => "Ocorreu um erro ao encontrar o registro para alteração!"
        ];
    }

    public function Excluir($id)
    {
        $plano = $this->repository->find($id);

        if ($plano) {
            if ($deletar = $plano->delete()) {
                return (object)[
                    'sucesso' => true,
                    'dados' => null,
                    'mensagem' => "Registro excluído com sucesso!"
                ];
            } else {
                return (object)[
                    'sucesso' => false,
                    'dados' => null,
                    'mensagem' => "Ocorreu um erro ao deletar o registro solicitado!"
                ];
            }
        }

        return (object)[
            'sucesso' => false,
            'dados' => null,
            'mensagem' => "Ocorreu um erro ao encontrar o registro para exclusão!"
        ];
    }
}