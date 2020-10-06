<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Query;

use Otis22\VetmanagerApi\Api\HTTP\Query;
use Otis22\VetmanagerApi\Assocify;

final class FromAssocify implements Query
{
    /**
     * @var Assocify
     */
    private $assocify;

    /**
     * FromAssocify constructor.
     * @param Assocify $assocify
     */
    public function __construct(Assocify $assocify)
    {
        $this->assocify = $assocify;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return $this->assocify->asAssoc();
    }
}
