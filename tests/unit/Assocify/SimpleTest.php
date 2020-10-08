<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Assocify;

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{

    public function testAsAssoc(): void
    {
        $this->assertArrayHasKey(
            "key",
            (
                new Simple("key", "value")
            )->asAssoc()
        );
    }
}
