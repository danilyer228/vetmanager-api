<?php


namespace Otis22\VetmanagerApi\Api\Auth;

use Otis22\VetmanagerApi\Api\Auth;

class ApiKeyAuth implements Auth
{
    /**
     * @var ApiKey
     */
    private $apiKey;

    /**
     * ApiKeyAuth constructor.
     * @param ApiKey $apiKey
     */
    public function __construct(ApiKey $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function asAssoc(): array
    {
        return [
            'X-REST-API-KEY' => strval($this->apiKey)
        ];
    }

}