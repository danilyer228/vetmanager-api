<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests;

use Otis22\VetmanagerApi\Url;
use PHPUnit\Framework\TestCase;

use function Otis22\VetmanagerApi\url;

class UrlTest extends TestCase
{
    public function testCreateUrl(): void
    {
        $this->assertStringContainsString(
            'Url',
            get_class(
                url('test')
            )
        );
    }

    public function testVetmanagerUrl(): void
    {
        $this->assertEquals(
            'https://test.vetmanager.ru',
            strval(new Url('test'))
        );
    }
}
