<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

interface Url extends \Stringable
{
    /**
     * Need for php older than 7.4v, because __toString generate fatal Error when throw any Exception
     * @return string
     */
    public function asString(): string;
}
