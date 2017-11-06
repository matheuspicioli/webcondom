<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Condominios\Condominio as CondominioTrait;

class Condominio extends Model
{
    use SoftDeletes, CondominioTrait;

    protected $primaryKey = "CondominioID";
    protected $table = "Condominios";
    protected $fillable = [
        "Nome", "Apelido", "Telefone", "Celular", "Unidades", "Multa", "Juros",
        "TipoJuros", "TemGas", "ValorGas", "EnderecoCOD", "SindicoCOD"
    ];
    protected $dates = [ "deleted_at" ];
    protected $appends = [ "TipoJurosFormatado", "CondominioDescricao" ];

    public function Endereco()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Endereco', 'EnderecoCOD', 'EnderecoID');
    }

    public function Sindico()
    {
        return $this->belongsTo('WebCondom\Models\Condominios\Sindico', 'SindicoCOD', 'SindicoID');
    }

    public function Taxas()
    {
        return $this->hasMany('WebCondom\Models\Condominios\CondominioTaxa', 'CondominioCOD', 'CondominioID');
    }
}
