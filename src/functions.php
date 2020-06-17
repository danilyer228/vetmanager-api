<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

use Otis22\VetmanagerApi\Host\FakeHostName;

function url(string $domainName): Url
{
    return new Url(
        new Protocol("https"),
        new FakeHostName()
    );
}
