<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $primaryKey = "EstadoID";
    protected $table = "Estados";
    protected $fillable = [ "Descricao", "Sigla" ];
}
