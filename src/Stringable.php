<?php

/**
 * User: otis
 * Need for use php version older 7.4 because __toString generate fatal Error when throwing exception
 */

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

interface Stringable
{
    public function asString(): string;
}
