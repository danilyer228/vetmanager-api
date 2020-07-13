<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests;

use Otis22\VetmanagerApi\Token\Credentials;
use Otis22\VetmanagerApi\Url;
use Otis22\VetmanagerApi\Token;
use PHPUnit\Framework\TestCase;

use function Otis22\VetmanagerApi\url;
use function Otis22\VetmanagerApi\url_test_env;
use function Otis22\VetmanagerApi\credentials;
use function Otis22\VetmanagerApi\token;

class FunctionsTest extends TestCase
{
    public function testUrlReturnInstanceOfUrl(): void
    {
        $this->assertTrue(url('test') instanceof Url);
    }

    public function testUrlReturnInstanceOfUrlForTestEnv(): void
    {
        $this->assertTrue(url_test_env('test') instanceof Url);
    }

    public function testCredentialsReturnInstanceOfCredentials(): void
    {
        $this->assertTrue(credentials('test', 'test', 'test') instanceof Credentials);
    }

    public function testTokenReturnInstanceOfToken(): void
    {
        $this->assertTrue(
            token(
                credentials('test', 'test', 'test'),
                url('test')
            ) instanceof Token
        );
    }
}
