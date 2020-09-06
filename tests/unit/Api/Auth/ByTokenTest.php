<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Api\Auth;

use Otis22\VetmanagerApi\Credentials\AppName;
use Otis22\VetmanagerApi\Token;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Api\Auth\ByToken;

class ByTokenTest extends TestCase
{

    public function testAsAssoc(): void
    {
        $this->assertArrayHasKey(
            "X-USER-TOKEN",
            (
                new ByToken(
                    new AppName("test"),
                    new Token\Concrete('fake')
                )
            )->asAssoc()
        );
    }
}
