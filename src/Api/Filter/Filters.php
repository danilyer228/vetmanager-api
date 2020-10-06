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
     * @return string
     */
    private function decodedFilters(): string
    {
        $filters = json_encode(
            array_map(
                function (Filter $el) {
                    return $el->asAssoc();
                },
                $this->filters
            )
        );
        if ($filters === false) {
            throw new \ValueError("Invalid filters");
        }
        return $filters;
    }
    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return [
            'filter' => $this->decodedFilters()
        ];
    }
}
