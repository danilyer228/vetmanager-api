<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP;

use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use PHPUnit\Framework\TestCase;

class HeadersTest extends TestCase
{

    public function testAsAssocContainsAuthInfo()
    {
        $this->assertArrayHasKey(
            'X-REST-API-KEY',
            (
                new Headers(
                    new ByApiKey(new ApiKey('test')),
                    []
                )
            )->asAssoc()
        );
    }

    public function testAsAssocContainsOtherHeaders()
    {
        $this->assertArrayHasKey(
            'testname',
            (
            new Headers(
                new ByApiKey(
                    new ApiKey('test')
                ),
                ['testname' => 'value']
            )
            )->asAssoc()
        );
    }
}
