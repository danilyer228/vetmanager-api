<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\URI;

use Otis22\VetmanagerApi\Api\Model;
use PHPUnit\Framework\TestCase;

class OnlyModelTest extends TestCase
{

    public function testAsString(): void
    {
        $this->assertEquals(
            '/rest/api/invoice',
            new OnlyModel(
                new Model('invoice')
            )
        );
    }
}
