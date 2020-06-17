<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

function url(string $domainName): Url
{
    return new Url($domainName);
}
