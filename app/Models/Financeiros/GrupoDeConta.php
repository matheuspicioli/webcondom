<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

class GrupoDeConta extends Model
{
    use Datas, SoftDeletes;

    protected $table = "grupo_de_contas";
    protected $fillable = ["descricao", "ratear"];

    public function getratearFormatadoAttribute()
    {
        return $this->ratear ? 'Sim' : 'Não';
    }
}
