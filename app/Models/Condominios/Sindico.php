<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sindico extends Model
{
    use SoftDeletes;

    protected $fillable = [ "Nome", "Telefone", "Celular" ];
    protected $dates = ['deleted_at'];
}
