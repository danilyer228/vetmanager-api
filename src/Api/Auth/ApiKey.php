<?php


namespace Otis22\VetmanagerApi\Api\Auth;

use Otis22\VetmanagerApi\Stringify;

class ApiKey implements Stringify
{
    /**
     * @var string
     */
    public $apiKey;

    /**
     * ApiKey constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->apiKey;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}