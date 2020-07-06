<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url;

use Otis22\VetmanagerApi\Url;

final class FakeUrl implements Url
{
    public function asString(): string
    {
        return 'https://fake.url';
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}
