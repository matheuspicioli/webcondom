<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use SoftDeletes;

    protected $table = "setores";
    protected $fillable = [ "descricao" ];
    protected $dates = [ "deleted_at" ];
}
