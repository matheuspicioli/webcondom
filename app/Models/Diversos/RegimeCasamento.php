<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegimeCasamento extends Model
{
    use SoftDeletes;

    protected $table = "regime_casamento";
    protected $fillable = [ "descricao" ];
    protected $dates = ['deleted_at'];
}
