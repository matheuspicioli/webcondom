<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 16/01/18
 * Time: 21:02
 */

namespace WebCondom\Services\Financeiros;


use WebCondom\Repositories\Financeiros\GrupoDeContasRepository;

class GrupoDeContasService
{
    private $repository;

    public function __construct(GrupoDeContasRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Listar()
    {
        $grupos = $this->repository->all();
        if ($grupos) {
            return (object)[
                'sucesso'   => true,
                'dados'     => $grupos,
                'mensagem'  => null
            ];
        }

        return (object)[
            'sucesso'   => false,
            'dados'     => null,
            'mensagem'  => 'Não foi possível trazer os dados'
        ];
    }

    public function Salvar($dados)
    {
        $grupo = $this->repository->create($dados);

        if($grupo){
            return (object)[
                'sucesso'   => true,
                'dados'     => $grupo,
                'mensagem'  => 'Inclusão de registro efetuado com sucesso!'
            ];
        }

        return (object)[
            'sucesso'   => false,
            'dados'     => null,
            'mensagem'  => "Ocorreu um erro ao incluir registro!"
        ];
    }

    public function Exibir($id)
    {
        $grupo = $this->repository->find($id);

        if ($grupo)
            return (object)[
                'sucesso'   => true,
                'dados'     => $grupo,
                'mensagem'  => "Registro encontrado."
            ];

        return (object)[
            'sucesso'   => false,
            'dados'     => null,
            'mensagem'  => "Ocorreu um erro ao encontrar o registro."
        ];
    }

    public function Alterar($request, $id)
    {
        $grupo = $this->repository->find($id);
        if ($grupo) {
            if ($alterar = $grupo->update($request->all())) {
                return (object)[
                    'sucesso'   => true,
                    'dados'     => $grupo,
                    'mensagem'  => "Registro alterado com sucesso!"
                ];
            } else {
                return (object)[
                    'sucesso'   => false,
                    'dados'     => null,
                    'mensagem'  => "Ocorreu um erro ao encontrar o registro para alteração!"
                ];
            }
        }

        return (object)[
            'sucesso'   => false,
            'dados'     => null,
            'mensagem'  => "Ocorreu um erro ao encontrar o registro para alteração!"
        ];
    }

    public function Excluir($id)
    {
        $grupo = $this->repository->find($id);

        if ($grupo) {
            if ($deletar = $grupo->delete()) {
                return (object)[
                    'sucesso'   => true,
                    'dados'     => null,
                    'mensagem'  => "Registro excluído com sucesso!"
                ];
            } else {
                return (object)[
                    'sucesso'   => false,
                    'dados'     => null,
                    'mensagem'  => "Ocorreu um erro ao deletar o registro solicitado!"
                ];
            }
        }

        return (object)[
            'sucesso'   => false,
            'dados'     => null,
            'mensagem'  => "Ocorreu um erro ao encontrar o registro para exclusão!"
        ];
    }
}