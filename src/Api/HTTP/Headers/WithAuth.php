<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Headers;

use Otis22\VetmanagerApi\Api\Auth;
use Otis22\VetmanagerApi\Api\HTTP\Headers;

final class WithAuth implements Headers
{
    /**
     * @var Auth
     */
    private $auth;

    /**
     * HeadersWithAuth constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return $this->auth->asAssoc();
    }
}
