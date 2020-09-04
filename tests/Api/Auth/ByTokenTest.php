<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Api\Auth;

use Otis22\VetmanagerApi\Token\AppName;
use Otis22\VetmanagerApi\Token\FakeToken;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Api\Auth\ByToken;

class ByTokenTest extends TestCase
{

    public function testAsAssoc()
    {
        $this->assertArrayHasKey(
            "X-USER-TOKEN",
            (
                new ByToken(
                    new AppName("test"),
                    new FakeToken()
                )
            )->asAssoc()
        );
    }
}
