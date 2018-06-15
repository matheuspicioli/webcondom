<?php

namespace WebCondom\Repositories\Financeiros;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Validators\PlanoDeContasValidator;

/**
 * Class PlanoDeContasRepositoryEloquent.
 *
 * @package namespace WebCondom\Repositories;
 */
class PlanoDeContasRepositoryEloquent extends BaseRepository implements PlanoDeContasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PlanoDeConta::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
