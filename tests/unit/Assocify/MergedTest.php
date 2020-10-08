<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Assocify;

use PHPUnit\Framework\TestCase;

class MergedTest extends TestCase
{
    public function testAsAssocFirstKey(): void
    {
        $this->assertArrayHasKey(
            "test",
            (
                new Merged(
                    new Simple("test", "value"),
                    new Simple("test2", "value2")
                )
            )->asAssoc()
        );
    }
    public function testAsAssocSecondKey(): void
    {
        $this->assertArrayHasKey(
            "test2",
            (
            new Merged(
                new Simple("test", "value"),
                new Simple("test2", "value2")
            )
            )->asAssoc()
        );
    }
}
