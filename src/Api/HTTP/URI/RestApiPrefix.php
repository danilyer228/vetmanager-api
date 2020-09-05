<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\URI;

use Otis22\VetmanagerApi\Stringify;

final class RestApiPrefix implements Stringify
{
    public function asString(): string
    {
        return '/rest/api/';
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}
