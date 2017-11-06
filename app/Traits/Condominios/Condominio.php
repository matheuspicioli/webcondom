<?php
namespace WebCondom\Traits\Condominios;

trait Condominio
{
    public function getTipoJurosFormatadoAttribute()
    {
        return $this->TipoJuros == "AM" ? "Ao mês" : "Ao dia";
    }

    public function getCondominioDescricaoAttribute()
    {
        return "$this->Nome - $this->Apelido";
    }
}