<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

use Otis22\VetmanagerApi\Host\HostName;

final class Url
{
    /**
     * @var Protocol
     */
    private $protocol;
    /**
     * @var HostName
     */
    private $hostName;

    /**
     * Url constructor.
     * @param Protocol $protocol
     * @param HostName $hostName
     */
    public function __construct(Protocol $protocol, HostName $hostName)
    {
        $this->protocol = $protocol;
        $this->hostName = $hostName;
    }

    public function __toString(): string
    {
        return $this->protocol . $this->hostName;
    }
}
