<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Headers;

use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use PHPUnit\Framework\TestCase;

class WithAuthAndParamsTest extends TestCase
{

    public function testAsAssocContainsAuthInfo(): void
    {
        $this->assertArrayHasKey(
            'X-REST-API-KEY',
            (
                new WithAuthAndParams(
                    new ByApiKey(new ApiKey('test')),
                    []
                )
            )->asAssoc()
        );
    }

    public function testAsAssocContainsOtherHeaders(): void
    {
        $this->assertArrayHasKey(
            'testname',
            (
            new WithAuthAndParams(
                new ByApiKey(
                    new ApiKey('test')
                ),
                ['testname' => 'value']
            )
            )->asAssoc()
        );
    }
}
