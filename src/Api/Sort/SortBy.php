<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Sort;

use Otis22\VetmanagerApi\Api\Model\Property;
use Otis22\VetmanagerApi\Assocify;
use Otis22\VetmanagerApi\VetmanagerApiException;

abstract class SortBy implements Assocify
{
    /**
     * @var Property
     */
    private $property;
    /**
     * @var string
     */
    protected $direction;

    /**
     * SortBy constructor.
     * @param Property $property
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }
    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        if (empty($this->direction)) {
            throw new VetmanagerApiException("Direction can not be empty.");
        }
        return [
            'property' => $this->property->asString(),
            'direction' => $this->direction
        ];
    }
}
