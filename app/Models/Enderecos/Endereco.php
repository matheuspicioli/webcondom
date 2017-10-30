<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $primaryKey = "EnderecoID";
    protected $table = "Enderecos";
    protected $fillable = [ "Logradouro", "Numero", "CEP", "Complemento", "CidadeCOD" ];

    public function Cidade()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Cidade', 'CidadeCOD', 'CidadeID');
    }
}
