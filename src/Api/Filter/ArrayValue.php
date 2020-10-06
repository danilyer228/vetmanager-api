<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Filter;

final class ArrayValue implements Value
{
    /**
     * @var int[] | string[]
     */
    private $value;

    /**
     * ArrayValue constructor.
     * @param int[]|string[] $value
     */
    public function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        $result = json_encode($this->value);
        if ($result === false) {
            throw new \ValueError("Invalid value " . strval($this->value));
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
