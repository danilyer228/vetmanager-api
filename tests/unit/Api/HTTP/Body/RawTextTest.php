<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Body;

use PHPUnit\Framework\TestCase;

class RawTextTest extends TestCase
{
    public function testAsString(): void
    {
        $this->assertEquals(
            'test',
            (
                new RawText('test')
            )->asString()
        );
    }
}
