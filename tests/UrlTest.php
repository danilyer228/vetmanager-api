<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests;

use Otis22\VetmanagerApi\Host\FakeHostName;
use Otis22\VetmanagerApi\Protocol;
use Otis22\VetmanagerApi\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testGenerateUrl(): void
    {
        $this->assertEquals(
            'http://fake.host',
            strval(
                new Url(
                    new Protocol("http"),
                    new FakeHostName()
                )
            )
        );
    }
}
