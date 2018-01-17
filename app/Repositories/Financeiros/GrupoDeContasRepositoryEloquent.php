<?php

namespace WebCondom\Repositories\Financeiros;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebCondom\Repositories\Financeiros\GrupoDeContasRepository;
use WebCondom\Models\Financeiros\GrupoDeConta;

/**
 * Class GrupoDeContasRepositoryEloquent.
 *
 * @package namespace WebCondom\Repositories;
 */
class GrupoDeContasRepositoryEloquent extends BaseRepository implements GrupoDeContasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GrupoDeConta::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
