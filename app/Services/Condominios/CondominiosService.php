<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 22/01/18
 * Time: 19:20
 */

namespace WebCondom\Services\Condominios;


use WebCondom\Repositories\Condominios\CondominiosRepository;

class CondominiosService
{
    private $repository;

    public function __construct(CondominiosRepository $repository)
    {
        $this->repository   = $repository;
    }

    public function Listar()
    {
        $condominios = $this->repository->all();
        if ($condominios) {
            return (object)[
                'sucesso'   => true,
                'dados'     => $condominios,
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
        $condominios = $this->repository->create($dados);

        if($condominios){
            return (object)[
                'sucesso'   => true,
                'dados'     => $condominios,
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
        $condominios = $this->repository->find($id);

        if ($condominios)
            return (object)[
                'sucesso'   => true,
                'dados'     => $condominios,
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
        $condominios = $this->repository->find($id);
        if ($condominios) {
            if ($alterar = $condominios->update($request->all())) {
                return (object)[
                    'sucesso'   => true,
                    'dados'     => $condominios,
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
        $condominios = $this->repository->find($id);

        if ($condominios) {
            if ($deletar = $condominios->delete()) {
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