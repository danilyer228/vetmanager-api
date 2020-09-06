<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url\Part;

final class Protocol
{
    /**
     * @var string
     */
    private $protocol;

    /**
     * Protocol constructor.
     *
     * @param string $protocol
     */
    public function __construct(string $protocol)
    {
        $this->protocol = $protocol;
    }

    public function __toString(): string
    {
        return $this->protocol . "://";
    }
}
