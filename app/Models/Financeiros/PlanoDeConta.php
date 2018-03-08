<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

class PlanoDeConta extends Model
{
    use Datas, SoftDeletes;

    protected $fillable = ['tipo','descricao'];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}