<?php
namespace WebCondom\Traits\Condominios;

trait Condominio
{
    public function gettipoJurosFormatadoAttribute()
    {
        return $this->tipo_juros == "AM" ? "Ao mês" : "Ao dia";
    }

    public function getcondominioDescricaoAttribute()
    {
        return "$this->nome - $this->apelido";
    }
}