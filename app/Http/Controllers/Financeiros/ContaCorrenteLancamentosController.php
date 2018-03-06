<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Financeiros\Conta;
use WebCondom\Models\Financeiros\ContaCorrenteLancamento;
use WebCondom\Models\Financeiros\Grupo;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Models\Financeiros\Tipo;

class ContaCorrenteLancamentosController extends Controller
{
    private $lancamento;

    public function __construct(ContaCorrenteLancamento $lancamento)
    {
        $this->lancamento = $lancamento;
    }
}
