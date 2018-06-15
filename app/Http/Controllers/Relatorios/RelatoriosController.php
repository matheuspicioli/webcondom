<?php

namespace WebCondom\Http\Controllers\Relatorios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Financeiros\ContaCorrenteLancamento;

class RelatoriosController extends Controller
{
	private $lancamento;

	public function __construct(ContaCorrenteLancamento $lancamento)
	{
		$this->lancamento = $lancamento;
	}

	public function exemplo () {
    	$lancamentos = $this->lancamento->all()->sortBy('data_lancamento');
		return \PDF::loadView('relatorios.exemplo', compact('lancamentos'))
			->setPaper('a4', 'landscape')
			->download('lancamentos-conta-corrente.pdf');
	}
}
