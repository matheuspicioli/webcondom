<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Models\Diversos\TipoImovel;
use WebCondom\Models\Entidades\Inquilino;
use WebCondom\Models\Entidades\Proprietario;

class Unidade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "bloco", "unidade", "garagem", "bloquear_acesso", "area_util", "area_total",
		"indice", "boleto_impresso", "boleto_impresso_destino", "boleto_email",
		"boleto_email_destino", "convocacao", "convocacao_destino", "correspondencia",
        "correspondencia_destino", "imobiliaria", "imobiliaria_contato", "observacoes",
		'condominio_id','proprietario_id','inquilino_id','tipo_imovel_id'
    ];
    protected $dates = [ "deleted_at" ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class );
    }

    public function tipo_imovel()
    {
        return $this->belongsTo(TipoImovel::class );
    }

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class );
    }

    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class );
    }
}
