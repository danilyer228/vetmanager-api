<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Token;

use Otis22\VetmanagerApi\Token\Credentials;
use Otis22\VetmanagerApi\Token\Login;
use Otis22\VetmanagerApi\Token\Password;
use Otis22\VetmanagerApi\Token\AppName;
use PHPUnit\Framework\TestCase;

class CredentialsTest extends TestCase
{
    public function testCredentialsAsAssoc(): void
    {
        $this->assertTrue(
            in_array(
                'test',
                (
                    new Credentials(
                        new Login("test"),
                        new Password("test"),
                        new AppName("test")
                    )
                )->asAssoc()
            )
        );
    }
}
