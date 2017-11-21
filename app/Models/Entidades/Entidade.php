<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = [
        "cpf_cnpj", "nome", "apelido", "rg_ie", "fantasia", "inscricao_municipal",
        "ramo_atividade", "data_abertura", "nome_mae", "estado_civil_id", "regime_casamento_id",
        "profissao", "data_nascimento", "nacionalidade", "empresa", "dependentes", "inss"
    ];
}
