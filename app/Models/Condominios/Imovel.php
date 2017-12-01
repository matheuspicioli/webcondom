<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = "imoveis";
    protected $fillable = [
        "codigo", "referencia", "endereco_id", "tipo_imovel_id",
        "categoria_id", "condominio_id", "valor_locacao", "valor_venda",
        "codigo_agua", "codigo_iptu", "codigo_energia", "descritivo"
    ];

    public function endereco()
    {
        return $this->belongsTo('WebCondom\Models\Enderecos\Endereco');
    }

    public function condominio()
    {
        return $this->belongsTo('WebCondom\Models\Condominios\Condominio');
    }

    public function categoria()
    {
        return $this->belongsTo('WebCondom\Models\Diversos\Categoria');
    }
}
