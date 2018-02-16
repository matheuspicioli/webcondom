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
    protected $fillable = ['tipo','ratear','descricao'];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
