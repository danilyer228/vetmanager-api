<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Assocify;

use Otis22\VetmanagerApi\Assocify;
use Otis22\VetmanagerApi\Stringify;

final class ArrayJsonDecoded implements Stringify
{
    /**
     * @var array<Assocify>
     */
    private $arr;

    /**
     * ArrayJsonDecoded constructor.
     * @param array<Assocify> $arr
     */
    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        $string = json_encode(
            array_map(
                function (Assocify $el) {
                    return $el->asAssoc();
                },
                $this->arr
            )
        );
        if ($string === false) {
            throw new \ValueError("Invalid array for encoding");
        }
        return $string;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
