<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Sort;

use Otis22\VetmanagerApi\Api\Model\Property;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{

    public function testAsAssoc(): void
    {
        $this->assertArrayHasKey(
            'sort',
            (
                new Sort(
                    new AscBy(
                        new Property("test")
                    )
                )
            )->asAssoc()
        );
    }

    public function testAdd(): void
    {
        $sort = new Sort(
            new AscBy(
                new Property("test")
            )
        );
        $sort->add(
            new DescBy(
                new Property("test2")
            )
        );
        $this->assertStringContainsString(
            'test',
            $sort->asAssoc()['sort']
        );
        $this->assertStringContainsString(
            'test2',
            $sort->asAssoc()['sort']
        );
    }
}
