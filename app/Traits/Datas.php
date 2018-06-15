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
        return $this->created_at ? $this->created_at->format('d/m/Y') : '';
    }

    public function getalteradoEmAttribute()
    {
        return $this->updated_at && $this->updated_at != $this->created_at ? $this->updated_at->format('d/m/Y') : 'Não sofreu alterações.';
    }
}