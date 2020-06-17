<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

final class Url
{
    /**
     * @var string
     */
    private $domain;

    public function __toString(): string
    {
        return $this->domain . "/vetmanager.ru";
    }


}
