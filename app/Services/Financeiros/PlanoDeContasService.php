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
        if ($grupo) {
            $ultima_conta_grupo = $grupo->contas()
                ->orderBy('conta', 'DESC')
                ->first();
            if ($ultima_conta_grupo) {
                $proxima_conta = (int)$ultima_conta_grupo->conta + 1;
                return Response::json([
                    'sucesso' => true,
                    'proxima-conta' => $proxima_conta,
                    'mensagem' => 'Consulta realizada com sucesso'
                ], 200);
            } else {
                return Response::json([
                    'sucesso' => false,
                    'mensagem' => 'Nenhuma conta cadastrada nesse grupo'
                ], 200);
            }
        } else {
            return Response::json([
                'sucesso' => false,
                'mensagem' => 'Nenhum grupo correspondente'
            ], 200);
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
        if ($request->conta) {
            $grupo = Grupo::where('grupo', $request->grupo)->first();
            $conta = Conta::create([
                'conta'         => is_null($request->conta) ? '0000' : $request->conta,
                'descricao'     => $request->descricao ? $request->descricao : null,
                'grupo_id'      => $grupo->id
            ]);
            return (object)[
                'sucesso' => true,
                'dados' => (object)[$conta, $grupo],
                'mensagem' => 'Inclusão de conta registrado com sucesso, sem o cadastro de grupo!'
            ];
        } else {
            $plano = $this->repository->create($request->all());
            $grupo = Grupo::create([
                'grupo' => $request->grupo,
                'plano_de_conta_id' => $plano->id
            ]);
            return (object)[
                'sucesso' => true,
                'dados' => (object)[$plano, $grupo],
                'mensagem' => 'Inclusão de grupo criado com sucesso!'
            ];
        }
    }

    public function Exibir($plano, $grupo, $conta)
    {
        $plano = $this->repository->find($plano);
        $grupo = Grupo::find($grupo);
        $conta = Conta::find($conta);

        if ($plano && $grupo && $conta)
            return (object)[
                'sucesso' => true,
                'dados' => (object)[
                    'plano' => $plano,
                    'grupo' => $grupo,
                    'conta' => $conta
                ],
                'mensagem' => "Registro encontrado."
            ];

        return (object)[
            'sucesso' => false,
            'dados' => null,
            'mensagem' => "Ocorreu um erro ao encontrar o registro."
        ];
    }

    public function Alterar($request, $plano, $grupo, $conta)
    {
        $plano = $this->repository->find($plano);
        if ($plano) {
            if ($request->conta) {
                $grupo = Grupo::where('grupo', $request->grupo)->where('id', $grupo)->first();
                $conta = Conta::find($conta)->update([
                    'conta'         => is_null($request->conta) ? '0000' : $request->conta,
                    'descricao'     => $request->descricao ? $request->descricao : null,
                    'grupo_id'      => $grupo->id
                ]);
                return (object)[
                    'sucesso' => true,
                    'dados' => (object)[$conta, $grupo],
                    'mensagem' => 'Alteração de conta feita com sucesso, sem o cadastro de grupo!'
                ];
            } else {
                $plano_alterado = $plano->update($request->all());
                $grupo = Grupo::find($grupo)->update([
                    'grupo' => $request->grupo,
                    'plano_de_conta_id' => $plano->id
                ]);
                return (object)[
                    'sucesso' => true,
                    'dados' => (object)[$plano_alterado, $grupo],
                    'mensagem' => 'Alteração de grupo feita com sucesso!'
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