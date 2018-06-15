<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;

    protected $fillable = [ "descricao" ];
    protected $dates = ['deleted_at'];

}
