<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

class Grupo extends Model
{
    use Datas, SoftDeletes;

    protected $fillable = ['grupo','ratear','descricao','plano_de_conta_id'];

    public function plano_de_conta()
    {
        return $this->belongsTo(PlanoDeConta::class, 'plano_de_conta_id');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }
}