<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/01/18
 * Time: 20:09
 */

namespace WebCondom\Services\Financeiros;

use Illuminate\Support\Facades\Response;
use WebCondom\Repositories\Financeiros\PlanoDeContasRepository;

class PlanoDeContasService
{
    private $repository;

    public function __construct(PlanoDeContasRepository $repository)
    {
        $this->repository = $repository;
    }

    public function ProximoCodigo()
    {
        $grupo = $this->repository
            ->orderBy('grupo', 'desc')
            ->first();
        $numeroProximoGrupo = (int)$grupo['grupo']+1;

        $conta = $this->repository
            ->where()
            ->orderBy('conta', 'desc')
            ->first();
        $numeroProximoConta = (int)$conta['conta']+1;

        return Response::json([
            'proxima-conta' => $numeroProximoConta,
            'proximo-grupo' => $numeroProximoGrupo
        ],200);
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

    public function Salvar($dados)
    {
        $plano = $this->repository->create($dados);

        if ($plano) {
            return (object)[
                'sucesso' => true,
                'dados' => $plano,
                'mensagem' => 'Inclusão de registro efetuado com sucesso!'
            ];
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
            if ($alterar = $plano->update($request->all())) {
                return (object)[
                    'sucesso' => true,
                    'dados' => $plano,
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