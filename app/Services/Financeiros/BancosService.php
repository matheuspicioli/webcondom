<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/01/18
 * Time: 20:04
 */

namespace WebCondom\Services\Financeiros;

use WebCondom\Repositories\Financeiros\BancosRepository;

class BancosService
{
    private $repository;

    public function __construct(BancosRepository $repository)
    {
        $this->repository   = $repository;
    }
    
    public function Listar()
    {
        $bancos = $this->repository->all();
        if ($bancos) {
            return (object)[
                'sucesso'   => true,
                'dados'     => $bancos,
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
        $banco = $this->repository->create($dados);

        if($banco){
            return (object)[
                'sucesso'   => true,
                'dados'     => $banco,
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
        $banco = $this->repository->find($id);

        if ($banco)
            return (object)[
                'sucesso'   => true,
                'dados'     => $banco,
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
        $banco = $this->repository->find($id);
        if ($banco) {
            if ($alterar = $banco->update($request->all())) {
                return (object)[
                    'sucesso'   => true,
                    'dados'     => $banco,
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
        $banco = $this->repository->find($id);

        if ($banco) {
            if ($deletar = $banco->delete()) {
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