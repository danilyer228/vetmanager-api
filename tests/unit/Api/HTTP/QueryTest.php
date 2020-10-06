<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Query;

use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{

    public function testAsAssoc(): void
    {
        $this->assertArrayHasKey(
            'key',
            (
                new FromArray(
                    ['key' => 'value']
                )
            )->asAssoc()
        );
    }
}
