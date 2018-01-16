<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";
    protected $fillable = [
        'codigoBanco',
        'nomeBanco',
        'CNAB',
        'carteira',
        'tamAgencia',
        'tamConta',
        'tamCedente',
        'tamNossoNumero',
        'localPagamento',
        'mensagem',
        'Logotipo',
        'mskCedente',
        'mskNossoNumero',
        'l_valor',
        'c_valor',
        'l_extenso1',
        'c_extenso1',
        'l_extenso2',
        'c_extenso2',
        'l_nominal',
        'c_nominal',
        'l_dia',
        'c_dia',
        'l_mes',
        'c_mes',
        'l_ano',
        'c_ano'
        ];
}