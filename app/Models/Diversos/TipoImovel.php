<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;

class TipoImovel extends Model
{
    protected $table = "tipo_imovel";
    protected $fillable = [ "descricao" ];
}
