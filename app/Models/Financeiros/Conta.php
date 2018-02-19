<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

class Conta extends Model
{
    use Datas, SoftDeletes;

    protected $table = 'contas';
    protected $fillable = ['conta', 'descricao', 'grupo_id'];

    public function grupo()
    {
        return $this->belongsTo('Grupo');
    }
}