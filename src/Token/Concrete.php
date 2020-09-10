<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Token;

use Otis22\VetmanagerApi\Token;

final class Concrete implements Token
{
    /**
     * @var string
     */
    private $token;

    /**
     * Concrete constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->token;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
