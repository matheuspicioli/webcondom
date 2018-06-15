<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [ "descricao", "sigla", "codigo_ibge" ];
}
