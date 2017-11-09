<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [ "descricao", "codigoIbge", "estado_id" ];

    public function estado()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Estado');
    }
}
