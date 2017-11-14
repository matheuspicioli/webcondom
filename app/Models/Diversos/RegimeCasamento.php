<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegimeCasamento extends Model
{
    use SoftDeletes;

    protected $primaryKey = "id";
    protected $table = "RegimeCasamento";
    protected $fillable = [ "Descricao" ];
    protected $dates = ['deleted_at'];
}
