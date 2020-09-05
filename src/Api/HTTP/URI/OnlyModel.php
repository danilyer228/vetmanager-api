<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\URI;

use Otis22\VetmanagerApi\Api\HTTP\URI;
use Otis22\VetmanagerApi\Api\Model;

class OnlyModel implements URI
{
    /**
     * @var Model
     */
    private $model;

    /**
     * URIOnlyModel constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return strval(new RestApiPrefix())
            . strval($this->model);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
