<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

final class Url
{
    /**
     * @var string
     */
    private $domain;

    /**
     * Url constructor.
     * @param string $domain
     */
    public function __construct(string $domain)
    {
        $this->domain = $domain;
    }


    public function __toString(): string
    {
        return 'https://'. $this->domain . ".vetmanager.ru";
    }
}
