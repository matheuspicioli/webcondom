<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Condominios\Condominio as CondominioTrait;

class Condominio extends Model
{
    use SoftDeletes, CondominioTrait;

    protected $fillable = [
        "nome", "apelido", "telefone", "celular", "unidades", "tem_gas", "valor_gas", "email", "endereco_id", "sindico_id"
    ];
    protected $dates = [ "deleted_at" ];

    public function endereco()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Endereco');
    }

    public function sindico()
    {
        return $this->belongsTo('WebCondom\Models\Condominios\Sindico');
    }

    public function taxas()
    {
        return $this->hasMany('WebCondom\Models\Condominios\CondominioTaxa');
    }
}
