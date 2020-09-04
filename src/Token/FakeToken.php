<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Token;

use Otis22\VetmanagerApi\Token;

final class FakeToken implements Token
{

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return 'fake';
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
