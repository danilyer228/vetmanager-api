<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url\Part;

final class Domain
{
    /**
     * @var string
     */
    private $domain;

    /**
     * Domain constructor.
     *
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
