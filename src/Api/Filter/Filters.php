<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Filter;

use Otis22\VetmanagerApi\Api\Filter;
use Otis22\VetmanagerApi\Assocify;

final class Filters implements Assocify
{
    /**
     * @var array<Filter>
     */
    private $filters;

    /**
     * Filters constructor.
     * @param Filter $filter
     */
    public function __construct(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    /**
     * @param Filter $filter
     * @return $this
     */
    public function add(Filter $filter)
    {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return [
            'filter' => (
                new Assocify\ArrayJsonDecoded($this->filters)
            )->asString()
        ];
    }
}
