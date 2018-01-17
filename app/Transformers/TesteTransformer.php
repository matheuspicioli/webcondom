<?php

namespace WebCondom\Transformers;

use League\Fractal\TransformerAbstract;
use WebCondom\Models\Teste;

/**
 * Class TesteTransformer.
 *
 * @package namespace WebCondom\Transformers;
 */
class TesteTransformer extends TransformerAbstract
{
    /**
     * Transform the Teste entity.
     *
     * @param \WebCondom\Models\Teste $model
     *
     * @return array
     */
    public function transform(Teste $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
