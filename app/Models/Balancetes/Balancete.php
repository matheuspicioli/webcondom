<?php

namespace WebCondom\Models\Balancetes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use WebCondom\Models\Condominios\Condominio;
use Toast;

class Balancete extends Model
{
	use SoftDeletes;

    protected $fillable = [
    	'referencia','competencia','data_inicial','data_final',
		'saldo_anterior','saldo_atual', 'condominio_id','resumo'
	];

    protected $dates = ['data_inicial', 'data_final'];

    public function erro($mensagem, $titulo)
	{
		Toast::error($mensagem, $titulo);
		return redirect()->route('financeiros.balancetes.listar');
	}

	public function setSaldoAtualAttribute($valor)
	{
		$this->attributes['saldo_atual'] = str_replace(',', '.', $valor);
	}

	public function getSaldoAtualViewAttribute()
	{
		return number_format($this->attributes['saldo_atual'],'2',',','.');
	}

	public function setSaldoAnteriorAttribute($valor)
	{
		$this->attributes['saldo_anterior'] = str_replace(',', '.', $valor);
	}

	public function getSaldoAnteriorViewAttribute()
	{
		return number_format($this->attributes['saldo_anterior'],'2',',','.');
	}

	public function lancamentos()
	{
		return $this->hasMany('WebCondom\Models\Balancetes\BalanceteLancamento','balancete_id');
	}

    public function condominio()
	{
	    return $this->belongsTo('WebCondom\Models\Condominios\Condominio','condominio_id');
	}
}
