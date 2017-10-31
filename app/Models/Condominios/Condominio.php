<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condominio extends Model
{
    use SoftDeletes;

    protected $primaryKey = "CondominioID";
    protected $table = "Condominios";
    protected $fillable = [
        "Nome", "Apelido", "Telefone", "Celular", "Unidades", "Multa", "Juros",
        "TipoJuros", "TemGas", "ValorGas", "EnderecoCOD", "SindicoCOD"
    ];
    protected $dates = [ "deleted_at" ];
    protected $appends = [ "EnderecoFormatado", "TipoJurosFormatado" ];

    public function getEnderecoFormatadoAttribute()
    {
        $logradouro = $this->Endereco->Logradouro;
        $numero     = $this->Endereco->Numero;
        $bairro     = $this->Endereco->Bairro;
        $cidade     = $this->Endereco->Cidade->Descricao." - ".$this->Endereco->Cidade->Estado->Sigla;
        return "$logradouro, $numero, $bairro - $cidade";
    }

    public function getTipoJurosFormatadoAttribute()
    {
        return $this->TipoJuros == "AM" ? "Ao mês" : "Ao dia";
    }

    public function Endereco()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Endereco', 'EnderecoCOD', 'EnderecoID');
    }

    public function Sindico()
    {
        return $this->belongsTo('WebCondom\Models\Sindico', 'SindicoCOD', 'SindicoID');
    }
}
