<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;
use WebCondom\Traits\Enderecos\Endereco as EnderecoTrait;

class Endereco extends Model
{
    use EnderecoTrait;

    protected $fillable = [ "logradouro", "numero", "cep", "complemento", "bairro", "cidade_id" ];

    public function cidade()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Cidade');
    }
}
