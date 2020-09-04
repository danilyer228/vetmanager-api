<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP;

use Otis22\VetmanagerApi\Assocify;

class Query implements Assocify
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
