<?php

namespace WebCondom\Repositories\Condominios;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebCondom\Models\Condominios\Condominio;

/**
 * Class CondominiosRepositoryEloquent.
 *
 * @package namespace WebCondom\Repositories;
 */
class CondominiosRepositoryEloquent extends BaseRepository implements CondominiosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Condominio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
