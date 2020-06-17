<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests;

use PHPUnit\Framework\TestCase;

use function Otis22\VetmanagerApi\url;

class FunctionsTest extends TestCase
{
    public function testUrlReturnInstanceOfUrl(): void
    {
        $this->assertStringContainsString(
            'Url',
            get_class(
                url('test')
            )
        );
    }
}
