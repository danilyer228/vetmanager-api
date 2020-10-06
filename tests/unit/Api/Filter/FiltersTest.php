<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Filter;

use Otis22\VetmanagerApi\Api\Model\Property;
use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase
{

    public function testEqualTo(): void
    {
        $this->assertArrayHasKey(
            'value',
            (
                new EqualTo(
                    new Property('test'),
                    new StringValue('test')
                )
            )->asAssoc()
        );
    }

    public function testNotEqualTo(): void
    {
        $this->assertTrue(
            in_array(
                '!=',
                (
                    new NotEqualTo(
                        new Property('test'),
                        new StringValue('test')
                    )
                )->asAssoc()
            )
        );
    }

    public function testMoreOrEqualThan(): void
    {
        $this->assertTrue(
            in_array(
                '>=',
                (
                new MoreOrEqualThan(
                    new Property('test'),
                    new StringValue(strval(5))
                )
                )->asAssoc()
            )
        );
    }

    public function testLessOrEqualThan(): void
    {
        $this->assertTrue(
            in_array(
                '<=',
                (
                new LessOrEqualThan(
                    new Property('test'),
                    new StringValue(strval(5))
                )
                )->asAssoc()
            )
        );
    }

    public function testLessThan(): void
    {
        $this->assertTrue(
            in_array(
                '<',
                (
                new LessThan(
                    new Property('test'),
                    new StringValue(strval(5))
                )
                )->asAssoc()
            )
        );
    }

    public function testMoreThan(): void
    {
        $this->assertTrue(
            in_array(
                '>',
                (
                new MoreThan(
                    new Property('test'),
                    new StringValue(strval(5))
                )
                )->asAssoc()
            )
        );
    }

    public function testLike(): void
    {
        $this->assertTrue(
            in_array(
                'like',
                (
                new Like(
                    new Property('test'),
                    new StringValue(strval(5))
                )
                )->asAssoc()
            )
        );
    }

    public function testInArray(): void
    {
        $this->assertTrue(
            in_array(
                'in',
                (
                new InArray(
                    new Property('test'),
                    new ArrayValue([1, 2, 3])
                )
                )->asAssoc()
            )
        );
    }

    public function testNotInArray(): void
    {
        $this->assertTrue(
            in_array(
                'in',
                (
                new InArray(
                    new Property('test'),
                    new ArrayValue([1, 2, 3])
                )
                )->asAssoc()
            )
        );
    }

    public function testFilters(): void
    {
        $this->assertArrayHasKey(
            'filter',
            (
                new Filters(
                    new EqualTo(
                        new Property('some'),
                        new StringValue('test')
                    )
                )
            )->asAssoc()
        );
    }
}
