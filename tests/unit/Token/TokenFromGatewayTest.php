<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Token;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Otis22\VetmanagerApi\Url;
use Otis22\VetmanagerApi\VetmanagerApiException;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Credentials\FakeCredentials;

class TokenFromGatewayTest extends TestCase
{

    public function testValidTokenResponse(): void
    {
        $mock = new MockHandler(
            [
                new Response(
                    200,
                    [],
                    '{
                        "status": 200,
                        "title": "Authorization completed.",
                        "detail": "Авторизация выполнена.",
                        "data": {
                            "service": "test_app",
                            "token": "add2da284cb3cd670729df1695065e9768a4f409",
                            "user_id": "3"
                        }
                    }'
                )
            ]
        );
        $handlerStack = HandlerStack::create($mock);

        $this->assertEquals(
            "add2da284cb3cd670729df1695065e9768a4f409",
            strval(
                new FromGateway(
                    new FakeCredentials(),
                    new Url\Concrete('https://fake.url'),
                    new Client(['handler' => $handlerStack])
                )
            )
        );
    }
    public function testWrongLoginOrPassword(): void
    {
        $this->expectException(VetmanagerApiException::class);
        $mock = new MockHandler(
            [
                new Response(
                    401,
                    [],
                    '{
                        "status": 401,
                        "title": "Wrong authentification.",
                        "detail": "Неправильный логин или пароль."
                    }'
                )
            ]
        );
        $handlerStack = HandlerStack::create($mock);
        $token = new FromGateway(
            new FakeCredentials(),
            new Url\Concrete('https://fake.url'),
            new Client(['handler' => $handlerStack])
        );
        $token->asString();
    }

    public function testWrongJson(): void
    {
        $this->expectException(VetmanagerApiException::class);
        $mock = new MockHandler(
            [
                new Response(
                    500,
                    [],
                    ''
                )
            ]
        );
        $handlerStack = HandlerStack::create($mock);
        $token = new FromGateway(
            new FakeCredentials(),
            new Url\Concrete('https://fake.url'),
            new Client(['handler' => $handlerStack])
        );
        $token->asString();
    }
}
