<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 24/11/17
 * Time: 08:27
 */

namespace WebCondom\Traits;

trait Datas
{
    public function getcriadoEmAttribute()
    {
        $dia = $this->created_at->day; $mes = $this->created_at->month; $ano = $this->created_at->year;
        $hora = $this->created_at->hour; $minuto = $this->created_at->minute; $segundo = $this->created_at->second;
        return "{$dia}/{$mes}/{$ano} {$hora}:{$minuto}:{$segundo}";
    }

    public function getalteradoEmAttribute()
    {
        $dia = $this->updated_at->day; $mes = $this->updated_at->month; $ano = $this->updated_at->year;
        $hora = $this->updated_at->hour; $minuto = $this->updated_at->minute; $segundo = $this->updated_at->second;
        return "{$dia}/{$mes}/{$ano} {$hora}:{$minuto}:{$segundo}";
    }
}