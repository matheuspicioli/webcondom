<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

class Grupo extends Model
{
    use Datas, SoftDeletes;

    protected $fillable = ['grupo','ratear','descricao','tipo_id'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }
}