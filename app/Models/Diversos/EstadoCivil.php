<?php

namespace WebCondom\Models\Diversos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCivil extends Model
{
    use SoftDeletes;

    protected $table = "EstadoCivil";
    protected $fillable = [ "Descricao", "ExigeConjuge" ];
    protected $dates = ['deleted_at'];

    public function getExigeConjugeFormatadoAttribute()
    {
        return $this->ExigeConjuge == 1 ? "Sim" : "Não";
    }
}
