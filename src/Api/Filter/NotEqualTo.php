<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Filter;

use Otis22\VetmanagerApi\Api\Filter;
use Otis22\VetmanagerApi\Api\Model\Property;

final class NotEqualTo implements Filter
{
    /**
     * @var string
     */
    private $operator = '!=';
    /**
     * @var Property
     */
    private $property;
    /**
     * @var StringValue
     */
    private $value;

    /**
     * EqualTo constructor.
     * @param Property $property
     * @param StringValue $value
     */
    public function __construct(Property $property, StringValue $value)
    {
        $this->property = $property;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        $filterSettings['property'] = $this->property->asString();
        $filterSettings['value'] = $this->value->asString();
        $filterSettings['operator'] = $this->operator;
        return $filterSettings;
    }
}
