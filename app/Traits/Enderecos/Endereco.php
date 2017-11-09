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
    public function getenderecoFormatadoAttribute()
    {
        $logradouro = $this->logradouro;
        $numero     = $this->numero;
        $bairro     = $this->bairro;
        $cidade     = $this->cidade->descricao." - ".$this->cidade->estado->sigla;
        return "$logradouro, $numero, $bairro - $cidade";
    }
}