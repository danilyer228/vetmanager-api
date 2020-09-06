<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Credentials;

use PHPUnit\Framework\TestCase;

class CredentialsTest extends TestCase
{
    public function testCredentialsAsAssoc(): void
    {
        $this->assertTrue(
            in_array(
                'test',
                (
                    new ByLoginPassword(
                        new Login("test"),
                        new Password("test"),
                        new AppName("test")
                    )
                )->asAssoc()
            )
        );
    }
}
