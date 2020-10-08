<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Assocify;

use Otis22\VetmanagerApi\Assocify;

final class Merged implements Assocify
{
    /**
     * @var Assocify
     */
    private $first;
    /**
     * @var Assocify
     */
    private $second;

    /**
     * Merged constructor.
     * @param Assocify $first
     * @param Assocify $second
     */
    public function __construct(Assocify $first, Assocify $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function asAssoc(): array
    {
        return array_merge(
            $this->first->asAssoc(),
            $this->second->asAssoc()
        );
    }
}
