<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;

/**
 * Class PlanoDeContas.
 *
 * @package namespace WebCondom\Models\Financeiros;
 */
class PlanoDeConta extends Model
{
    use Datas, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'descricao', 'tipo', 'categoria', 'classificacao', 'codigo', 'grupo_contas_id' ];

    public function grupo_contas()
    {
        return $this->belongsTo(GrupoDeConta::class, 'grupo_contas_id');
    }
}
