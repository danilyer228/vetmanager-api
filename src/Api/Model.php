<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use Otis22\VetmanagerApi\Stringify;
use Otis22\VetmanagerApi\VetmanagerApiException;

class Model implements Stringify
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var array
     */
    private $validModels = [
        'invoice',
        'client'
    ];

    /**
     * Model constructor.
     * @param string $model
     */
    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     * @throws VetmanagerApiException
     */
    public function asString(): string
    {
        if (in_array($this->model, $this->validModels)) {
            return $this->model;
        }
        throw new VetmanagerApiException("Model is not valid");
    }

    /**
     * @return string
     * @throws VetmanagerApiException
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
