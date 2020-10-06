<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Model;

use Otis22\VetmanagerApi\Stringify;

final class Property implements Stringify
{
    /**
     * @var string
     */
    private $propery;

    /**
     * Property constructor.
     * @param string $propery
     */
    public function __construct(string $propery)
    {
        $this->propery = $propery;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->propery;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
