<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\URI;

use Otis22\VetmanagerApi\Api\HTTP\URI;
use Otis22\VetmanagerApi\Api\Model;

class URIWithId implements URI
{
    /**
     * @var Model
     */
    private $model;
    /**
     * @var int
     */
    private $id;

    /**
     * URIWithId constructor.
     * @param Model $model
     * @param int $id
     */
    public function __construct(Model $model, int $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return strval($this->asString()) . "/" . strval($this->id);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
