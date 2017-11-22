<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use SoftDeletes;

    protected $fillable = [ "codigo", "setor_id", "departamento_id]", "entidade_id" ];
    protected $dates = [ "deleted_at" ];

    public function entidade()
    {
        return $this->belongsTo('Entidade');
    }
}
