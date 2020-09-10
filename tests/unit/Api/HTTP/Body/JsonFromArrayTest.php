<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Body;

use Otis22\VetmanagerApi\VetmanagerApiException;
use PHPUnit\Framework\TestCase;

class JsonFromArrayTest extends TestCase
{
    public function testAsString(): void
    {
        $this->assertEquals(
            '{"a":"b"}',
            (
                new JsonFromArray(
                    ["a" => "b"]
                )
            )->asString()
        );
    }
}
