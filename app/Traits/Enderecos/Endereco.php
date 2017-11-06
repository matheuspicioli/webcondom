<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 06/11/17
 * Time: 16:03
 */

namespace WebCondom\Traits\Enderecos;


trait Endereco
{
    public function getEnderecoFormatadoAttribute()
    {
        $logradouro = $this->Logradouro;
        $numero     = $this->Numero;
        $bairro     = $this->Bairro;
        $cidade     = $this->Cidade->Descricao." - ".$this->Cidade->Estado->Sigla;
        return "$logradouro, $numero, $bairro - $cidade";
    }
}