<?php

namespace Otis22\VetmanagerApi\functions;

use Otis22\VetmanagerApi\Url;

function url($domainName): Url {
    return new Url($domainName);
}