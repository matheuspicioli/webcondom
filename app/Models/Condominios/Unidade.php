<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "condominio_id", "bloco", "unidade", "tipo_imovel_id", "garagem", "bloquear_acesso", "proprietario_id",
        "inquilino_id", "area_util", "area_total", "indice", "boleto_impresso", "boleto_impresso_destino",
        "boleto_email", "boleto_email_destino", "convocacao", "convocacao_destino", "correspondencia",
        "correspondencia_destino", "imobiliaria", "imobiliaria_contato", "observacoes"
    ];
    protected $dates = [ "deleted_at" ];

    public function condominio()
    {
        $this->belongsTo('WebCondom\Models\Condominios\Condominio');
    }

    public function tipo_imovel()
    {
        return $this->belongsTo('WebCondom\Models\Diversos\TipoImovel');
    }

    public function proprietario()
    {
        return $this->belongsTo('WebCondom\Models\Entidades\Proprietario');
    }

    public function inquilino()
    {
        return $this->belongsTo('WebCondom\Models\Entidades\Inquilino');
    }



}
