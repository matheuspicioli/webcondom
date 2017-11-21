<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCivil extends Model
{
    use SoftDeletes;

    protected $table = "estado_civil";
    protected $fillable = [ "descricao", "exige_conjuge" ];
    protected $dates = ['deleted_at'];

    public function getExigeConjugeFormatadoAttribute()
    {
        return $this->exige_conjuge == 1 ? "Sim" : "Não";
    }
}
