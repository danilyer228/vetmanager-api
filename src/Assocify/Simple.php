<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Assocify;

use Otis22\VetmanagerApi\Assocify;

final class Simple implements Assocify
{
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $value;

    /**
     * Simple constructor.
     * @param string $key
     * @param string $value
     */
    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return [
            $this->key => $this->value
        ];
    }
}
