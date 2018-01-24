<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $fillable = [ "creci", "logo", "email_nfe", "entidade_id"];

    public function entidade()
    {
        return $this->belongsTo('WebCondom\Models\Entidades\Entidade');
    }
}
