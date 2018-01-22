<?php

namespace WebCondom\Repositories\Financeiros;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebCondom\Repositories\Financeiros\ContasCorrenteRepository;
use WebCondom\Models\Financeiros\ContaCorrente;
use WebCondom\Validators\ContasCorrenteValidator;

/**
 * Class ContasCorrenteRepositoryEloquent.
 *
 * @package namespace WebCondom\Repositories;
 */
class ContasCorrenteRepositoryEloquent extends BaseRepository implements ContasCorrenteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContaCorrente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
