<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";
    protected $fillable = [
        'codigo_banco',
        'nome_banco',
        'CNAB',
        'carteira',
        'tamanho_agencia',
        'tamanho_conta',
        'tamanho_cedente',
        'tamanho_nossonumero',
        'local_pagamento',
        'mensagem',
        'foto',
        'mascara_cedente',
        'mascara_nossonumero',
        'linha_valor',
        'coluna_valor',
        'linha_extenso1',
        'coluna_extenso1',
        'linha_extenso2',
        'coluna_extenso2',
        'linha_nominal',
        'coluna_nominal',
        'linha_dia',
        'coluna_dia',
        'linha_mes',
        'coluna_mes',
        'linha_ano',
        'coluna_ano'
        ];
}