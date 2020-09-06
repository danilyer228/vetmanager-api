<?php

namespace Otis22\VetmanagerApi\Url\Part;

use PHPUnit\Framework\TestCase;

class ProtocolTest extends TestCase
{
    public function testHttpProtocol(): void
    {
        $this->assertEquals(
            "http://",
            strval(
                new Protocol("http")
            )
        );
    }
}
