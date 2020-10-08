<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Assocify;

use PHPUnit\Framework\TestCase;

class ArrayJsonDecodedTest extends TestCase
{
    public function testAsString(): void
    {
        $this->assertEquals(
            '[{"key":"value"}]',
            (
                new ArrayJsonDecoded(
                    [
                        new Simple("key", "value")
                    ]
                )
            )->asString()
        );
    }
}
