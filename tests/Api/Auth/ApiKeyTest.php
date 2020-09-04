<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Auth;

use PHPUnit\Framework\TestCase;

class ApiKeyTest extends TestCase
{
    public function testApiKey(): void
    {
        $this->assertEquals(
            'test-key',
            (
                new ApiKey('test-key')
            )->asString()
        );
    }

}
