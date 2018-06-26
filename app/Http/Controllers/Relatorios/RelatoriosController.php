<?php

namespace WebCondom\Http\Controllers\Relatorios;

use Illuminate\Support\Facades\Storage;
use PDF;
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
    	dd( $lancamentos );
    	$data = [ 'lancamentos' => $lancamentos ];
//		$pdf = PDF::loadView('relatorios.exemplo', $data )
//			->setPaper('a4', 'landscape');
		return view('relatorios.exemplo', $data);
//		return $pdf->stream();
	}
}
