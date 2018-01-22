<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/01/18
 * Time: 19:20
 */

namespace WebCondom\Services\Financeiros;

use WebCondom\Repositories\Financeiros\ContasCorrenteRepository;

class ContasCorrenteService
{
    private $repository;
    private $bancos;

    public function __construct(ContasCorrenteRepository $repository,
                                    BancosService $bancosService)
    {
        $this->repository   = $repository;
        $this->bancos       = $bancosService;
    }

    public function checkbox_true_false($dados)
    {
        isset($dados['principal'])  && $dados['principal']  == 'on' ? $dados['principal']   = true : false;
        isset($dados['aceita'])     && $dados['aceita']     == 'on' ? $dados['aceita']      = true : false;
        return $dados;
    }

    public function Listar()
    {
        $contas = $this->repository->all();
        if ($contas) {
            return (object)[
                'sucesso'   => true,
                'dados'     => $contas,
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
        $dados = $this->checkbox_true_false($dados);
        $conta = $this->repository->create($dados);

        if($conta){
            return (object)[
                'sucesso'   => true,
                'dados'     => $conta,
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
        $conta = $this->repository->find($id);

        if ($conta)
            return (object)[
                'sucesso'   => true,
                'dados'     => $conta,
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
        $conta = $this->repository->find($id);
        if ($conta) {
            $request = $this->checkbox_true_false($request);
            if ($alterar = $conta->update($request->all())) {
                return (object)[
                    'sucesso'   => true,
                    'dados'     => $conta,
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
        $conta = $this->repository->find($id);

        if ($conta) {
            if ($deletar = $conta->delete()) {
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