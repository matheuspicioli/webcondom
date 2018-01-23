<?php
namespace WebCondom\Traits\Financeiros;

trait ContaCorrente
{
    public function gettipoJurosFormatadoAttribute()
    {
        return $this->tipo_juros == "AM" ? "Ao Mês" : "Ao Dia";
    }
}
