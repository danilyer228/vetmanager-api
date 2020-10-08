<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Sort;

use Otis22\VetmanagerApi\Assocify;

final class Sort implements Assocify
{
    /**
     * @var array <SortBy>
     */
    private $sorts;

    /**
     * Sort constructor.
     * @param SortBy $sort
     */
    public function __construct(SortBy $sort)
    {
        $this->sorts[] = $sort;
    }

    /**
     * @param SortBy $sort
     * @return $this
     */
    public function add(SortBy $sort)
    {
        $this->sorts[] = $sort;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return [
            'sort' => (
                new Assocify\ArrayJsonDecoded($this->sorts)
            )->asString()
        ];
    }
}
