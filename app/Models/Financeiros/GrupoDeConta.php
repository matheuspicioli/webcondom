<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use WebCondom\Traits\Datas;

class GrupoDeConta extends Model
{
    use Datas;

    protected $table = "grupo_de_contas";
    protected $fillable = ["descricao", "ratear"];

    public function getratearFormatadoAttribute()
    {
        return $this->ratear ? 'Sim' : 'Não';
    }
}
