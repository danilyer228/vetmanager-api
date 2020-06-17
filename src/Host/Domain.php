<?php

/**
 * User: otis
 * Date: 17.06.20
 * Time: 14:16
 */

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Host;

final class Domain
{
    /**
     * @var string
     */
    private $domain;

    /**
     * Domain constructor.
     * @param string $domain
     */
    public function __construct(string $domain)
    {
        $this->domain = $domain;
    }

    public function __toString(): string
    {
        return $this->domain;
    }
}
