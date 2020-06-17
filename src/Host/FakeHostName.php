<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Host;

final class FakeHostName implements HostName
{
    public function __toString(): string
    {
        return "fake.host";
    }
}
