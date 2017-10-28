<?php

namespace WebCondom\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $primaryKey = "CidadeID";
    protected $table = "Cidades";
    protected $fillable = [ "Descricao", "CodigoIBGE", "EstadoCOD" ];

    public function Estado()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Estado', 'EstadoCOD', 'EstadoID');
    }
}
