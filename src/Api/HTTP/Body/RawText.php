<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Body;

use Otis22\VetmanagerApi\Api\HTTP\Body;

final class RawText implements Body
{

    /**
     * @var string
     */
    private $rawText;

    /**
     * RawText constructor.
     * @param string $rawText
     */
    public function __construct(string $rawText)
    {
        $this->rawText = $rawText;
    }


    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->rawText;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
