<?php

namespace WebCondom\Models\Entidades;

use Illuminate\Database\Eloquent\Model;
use WebCondom\Traits\Datas;

class Entidade extends Model
{
    use Datas;

    protected $fillable = [
        "cpf_cnpj", "nome", "apelido", "rg_ie", "fantasia", "inscricao_municipal", "tipo",
        "ramo_atividade", "data_abertura", "nome_mae", "estado_civil_id", "regime_casamento_id",
        "profissao", "data_nascimento", "nacionalidade", "empresa", "dependentes", "inss", "endereco_principal_id",
        "telefone_principal", "telefone_comercial", "celular_1", "celular_2", "site", "email", "endereco_cobranca_id"
    ];

    protected $dates = [ 'data_abertura', 'data_nascimento' ];

    public function endereco_principal()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Endereco', 'endereco_principal_id');
    }

    public function endereco_cobranca()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Endereco', 'endereco_cobranca_id');
    }

    public function getdataNascimentoFormatadoAttribute()
    {
        $dia = $this->data_nascimento->day;
        $mes = $this->data_nascimento->month;
        $ano = $this->data_nascimento->year;

        return "{$dia}/{$mes}/{$ano}";
    }

    public function getdataAberturaFormatadoAttribute()
    {
        $dia = $this->data_abertura->day;
        $mes = $this->data_abertura->month;
        $ano = $this->data_abertura->year;

        return "{$dia}/{$mes}/{$ano}";
    }
}
