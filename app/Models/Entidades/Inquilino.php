<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquilino extends Model
{
    use SoftDeletes;

    protected $fillable = [ "codigo", "entidade_id" ];
    protected $dates = [ "deleted_at" ];

    public function entidade()
    {
        return $this->belongsTo('WebCondom\Models\Entidades\Entidade');
    }
}
