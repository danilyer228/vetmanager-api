<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests;

use PHPUnit\Framework\TestCase;

use function Otis22\VetmanagerApi\url;
use function Otis22\VetmanagerApi\url_test_env;

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

    public function testUrlReturnInstanceOfUrlForTestEnv(): void
    {
        $this->assertStringContainsString(
            'Url',
            get_class(
                url_test_env('test')
            )
        );
    }
}
