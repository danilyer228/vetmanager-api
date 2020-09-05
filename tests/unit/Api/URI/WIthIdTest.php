<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\URI;

use Otis22\VetmanagerApi\Api\Model;
use PHPUnit\Framework\TestCase;

class WIthIdTestTest extends TestCase
{

    public function testAsString(): void
    {
        $this->assertEquals(
            '/rest/api/invoice/1',
            new WithId(
                new Model('invoice'),
                1
            )
        );
    }
}
