<?php

namespace WebCondom\Models\Balancetes;

use Illuminate\Database\Eloquent\Model;
use Toast;

class Balancete extends Model
{
    protected $fillable = [
    	'referencia','competencia','data_inicial','data_final',
		'saldo_anterior','saldo_atual', 'condominio_id'
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

	public function getSaldoAtualAttribute()
	{
		return str_replace('.',',', $this->attributes['saldo_atual']);
	}

	public function setSaldoAnteriorAttribute($valor)
	{
		$this->attributes['saldo_anterior'] = str_replace(',', '.', $valor);
	}

	public function getSaldoAnteriorAttribute()
	{
		return str_replace('.',',', $this->attributes['saldo_anterior']);
	}

    public function condominio()
	{
		return $this->belongsTo('WebCondom\Models\Condominios\Condominio','condominio_id');
	}
}
