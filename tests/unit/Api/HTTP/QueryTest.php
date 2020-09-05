<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP;

use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{

    public function testAsAssoc(): void
    {
        $this->assertArrayHasKey(
            'key',
            (
                new Query(
                    ['key' => 'value']
                )
            )->asAssoc()
        );
    }
}
