<?php

namespace WebCondom\Models\Condominios;

use Illuminate\Database\Eloquent\Model;

class CondominioTaxa extends Model
{
    protected $primaryKey = "CondominioTaxaID";
    protected $table = "CondominiosTaxas";
    protected $fillable = [ "Descricao", "Valor", "CondominioCOD" ];
    protected $appends = [ "Taxa" ];

    public function getTaxaAttribute()
    {
        return "$this->Descricao - $this->Valor";
    }

    public function Condominio()
    {
        $this->belongsTo('WebCondom\Models\Condominios\Condominio', 'CondominioCOD', 'CondominioID');
    }
}
