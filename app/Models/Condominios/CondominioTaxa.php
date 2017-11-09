<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;

class CondominioTaxa extends Model
{
    protected $fillable = [ "descricao", "valor", "condominio_id" ];
    protected $appends = [ "taxa" ];

    public function gettaxaAttribute()
    {
        return "$this->descricao - $this->valor";
    }

    public function condominio()
    {
        $this->belongsTo('WebCondom\Models\Condominios\Condominio');
    }
}
