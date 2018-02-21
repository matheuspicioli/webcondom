<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

class Tipo extends Model
{
    use Datas, SoftDeletes;

    protected $fillable = ['tipo','descricao','plano_conta_id'];

    public function plano_conta()
    {
        return $this->belongsTo(PlanoDeConta::class, 'plano_conta_id');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}