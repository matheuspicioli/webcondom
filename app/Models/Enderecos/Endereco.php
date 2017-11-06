<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;
use WebCondom\Traits\Enderecos\Endereco as EnderecoTrait;

class Endereco extends Model
{
    use EnderecoTrait;

    protected $primaryKey = "EnderecoID";
    protected $table = "Enderecos";
    protected $fillable = [ "Logradouro", "Numero", "CEP", "Complemento", "Bairro", "CidadeCOD" ];
    protected $appends = [ "EnderecoFormatado" ];

    public function Cidade()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Cidade', 'CidadeCOD', 'CidadeID');
    }
}
