<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Api\Auth;

use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Api\Auth\ApiKey;

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
