<?php
namespace WebCondom\Traits\Condominios;

trait Condominio
{
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
}