<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests;

use Otis22\VetmanagerApi\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testCreateUrl(): void
    {
        $this->assertStringContainsString(
            'Url',
            get_class(
                new Url('test')
            )
        );
    }

    public function testVetmanagerUrl(): void
    {
        $this->assertEquals(
            'test.vetmanager.ru',
            strval(new Url('test'))
        );
    }
}
