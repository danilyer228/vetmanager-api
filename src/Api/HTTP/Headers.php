<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP;

use Otis22\VetmanagerApi\Api\Auth;
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
     * @param array<string|string> $otherHeaders
     */
    public function __construct(Auth $auth, array $otherHeaders)
    {
        $this->auth = $auth;
        $this->otherHeaders = $otherHeaders;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return array_merge($this->auth->asAssoc(), $this->otherHeaders);
    }
}
