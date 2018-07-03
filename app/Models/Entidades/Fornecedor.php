<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;

    protected $table = "fornecedores";
    protected $fillable = [ "codigo", "tipo_fornecedor", "entidade_id" ];
    protected $dates = [ "deleted_at" ];

    public function entidade()
    {
        return $this->belongsTo('WebCondom\Models\Entidades\Entidade');
    }
}
