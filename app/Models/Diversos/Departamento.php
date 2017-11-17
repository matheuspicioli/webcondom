<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;

    protected $primaryKey = "id";
    protected $table = "Departamentos";
    protected $fillable = [ "Descricao" ];
    protected $dates = ['deleted_at'];

}
