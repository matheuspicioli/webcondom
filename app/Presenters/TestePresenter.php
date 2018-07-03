<?php

namespace WebCondom\Presenters;

use WebCondom\Transformers\TesteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TestePresenter.
 *
 * @package namespace WebCondom\Presenters;
 */
class TestePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TesteTransformer();
    }
}
