<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;

class GrupoDeConta extends Model
{
    protected $table = "grupo_de_contas";
    protected $fillable = ["descricao", "ratear"];
}
