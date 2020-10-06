<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Filter;

final class StringValue implements Value
{
    /**
     * @var string
     */
    private $value;

    /**
     * StringValue constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
