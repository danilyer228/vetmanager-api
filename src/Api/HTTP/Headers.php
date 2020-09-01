<?php


namespace Otis22\VetmanagerApi\Api;


use Otis22\VetmanagerApi\Assocify;

class Headers implements Assocify
{
    /**
     * @var Auth
     */
    private $auth;
    /**
     * @var array<string|string>
     */
    private $otherHeaders;

    /**
     * Headers constructor.
     * @param Auth $auth
     * @param array $otherHeaders
     */
    public function __construct(Auth $auth, array $otherHeaders)
    {
        $this->auth = $auth;
        $this->otherHeaders = $otherHeaders;
    }

    public function asAssoc(): array
    {
        return array_merge($this->asAssoc(), $this->otherHeaders);
    }

}