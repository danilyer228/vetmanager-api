<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Query;

use Otis22\VetmanagerApi\Api\HTTP\Query;

class FromArray implements Query
{
    /**
     * @var array<string|string>
     */
    private $params;

    /**
     * Query constructor.
     * @param array<string|string> $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function asAssoc(): array
    {
        return $this->params;
    }
}
