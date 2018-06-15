<?php

namespace WebCondom\Repositories\Financeiros;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebCondom\Models\Financeiros\Banco;
use WebCondom\Validators\BancosValidator;

/**
 * Class BancosRepositoryEloquent.
 *
 * @package namespace WebCondom\Repositories;
 */
class BancosRepositoryEloquent extends BaseRepository implements BancosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banco::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
