<?php

namespace WebCondom\Models\Balancetes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BalancateLancamento extends Model
{
	use SoftDeletes;

	protected $table = 'balancete_lancamentos';
	protected $fillable = [
		'data_lancamento','documento','historico','valor','tipo','folha',
		'balancete_id','plano_contas_id','fornecedor_id'
	];
	protected $dates = ['data_lancamento'];

	public function balancete()
	{
		return $this->belongsTo('Balancete','balancete_id');
	}

	public function plano_conta()
	{
		return $this->belongsTo('WebCondom\Models\Financeiros\Conta','plano_contas_id');
	}

	public function fornecedor()
	{
		return $this->belongsTo('WebCondom\Models\Entidades\Fornecedor','fornecedor_id');
	}

	public function setValorAttribute($valor)
	{
		$this->attributes['valor'] = str_replace(',', '.', $valor);
	}

	public function getValorAttribute()
	{
		return str_replace('.',',', $this->attributes['valor']);
	}

	public function erro($mensagem, $titulo)
	{
		Toast::error($mensagem, $titulo);
		return redirect()->route('financeiros.balancetes.listar');
	}
}
