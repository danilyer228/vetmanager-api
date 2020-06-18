<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Host;

use Otis22\VetmanagerApi\Url\Domain;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase
{
    public function testDomainToString(): void
    {
        $this->assertEquals(
            "test",
            strval(
                new Domain("test")
            )
        );
    }
}
