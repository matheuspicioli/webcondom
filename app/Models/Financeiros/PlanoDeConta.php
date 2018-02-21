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
    protected $table = 'plano_contas';
    protected $fillable = ['ratear','descricao'];

    public function tipos()
    {
        return $this->hasMany(Tipo::class, 'plano_conta_id');
    }
}
