<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCivil extends Model
{
    use SoftDeletes;

    protected $primaryKey = "Id";
    protected $table = "EstadoCivil";
    protected $fillable = [ "Descricao" ];
    protected $dates = ['deleted_at'];
}
