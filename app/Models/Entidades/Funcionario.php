<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes;

    protected $fillable = [ "codigo", "setor_id", "departamento_id", "entidade_id" ];
    protected $dates = [ "deleted_at" ];

    public function entidade()
    {
        return $this->belongsTo('WebCondom\Models\Entidades\Entidade');
    }

    public function setor()
    {
        return $this->belongsTo('WebCondom\Models\Diversos\Setor');
    }

    public function departamento()
    {
        return $this->belongsTo('WebCondom\Models\Diversos\Departamento');
    }
}