<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url;

use Otis22\VetmanagerApi\Url;

final class Concrete implements Url
{
    /**
     * @var string
     */
    private $url;

    /**
     * Concrete constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
