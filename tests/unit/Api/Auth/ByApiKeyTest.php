<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Auth;

use PHPUnit\Framework\TestCase;

class ByApiKeyTest extends TestCase
{

    public function testAsAssoc(): void
    {
        $this->assertArrayHasKey(
            'X-REST-API-KEY',
            (
                new ByApiKey(
                    new ApiKey('test')
                )
            )->asAssoc()
        );
    }
}
