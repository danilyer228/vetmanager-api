<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Headers;

use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use PHPUnit\Framework\TestCase;

class WithAuthTest extends TestCase
{

    public function testAsAssocContainsAuthInfo(): void
    {
        $this->assertArrayHasKey(
            'X-REST-API-KEY',
            (
                new WithAuth(
                    new ByApiKey(new ApiKey('test'))
                )
            )->asAssoc()
        );
    }
}
