<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use Otis22\VetmanagerApi\Url\BillingApi;
use Otis22\VetmanagerApi\Url\Concrete;
use Otis22\VetmanagerApi\Url\FromBillingApiGateway;
use Otis22\VetmanagerApi\Url\Part\Domain;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Api\HTTP;
use Otis22\VetmanagerApi\Api\HTTP\Query;

use function Otis22\VetmanagerApi\not_empty_env;

class RequestTest extends TestCase
{
    private function createClient(): Client
    {
        $mock = new MockHandler(
            [
                new Response(
                    200,
                    [],
                    '{"success":true}'
                )
            ]
        );
        $handlerStack = HandlerStack::create($mock);
        return new Client(['handler' => $handlerStack]);
    }

    public function testGetResponse(): void
    {
        $this->assertJson(
            strval(
                (
                    new Get(
                        $this->createClient(),
                        new Concrete('http://fake.url/rest/client'),
                        new HTTP\Headers\WithAuth(
                            new ByApiKey(
                                new ApiKey(
                                    "key"
                                )
                            )
                        ),
                        new Query([])
                    )
                )->response()
                    ->getBody()
            )
        );
    }

    public function testPutResponse(): void
    {
        $this->assertJson(
            strval(
                (
                new Put(
                    $this->createClient(),
                    new Concrete('http://fake.url/rest/client/1'),
                    new HTTP\Headers\WithAuth(
                        new ByApiKey(
                            new ApiKey(
                                "key"
                            )
                        )
                    ),
                    new HTTP\Body\JsonFromArray([])
                )
                )->response()
                    ->getBody()
            )
        );
    }

    public function testPostResponse(): void
    {
        $this->assertJson(
            strval(
                (
                new Put(
                    $this->createClient(),
                    new Concrete('http://fake.url/rest/client'),
                    new HTTP\Headers\WithAuth(
                        new ByApiKey(
                            new ApiKey(
                                "key"
                            )
                        )
                    ),
                    new HTTP\Body\JsonFromArray([])
                )
                )->response()
                    ->getBody()
            )
        );
    }

    public function testDeleteResponse(): void
    {
        $this->assertJson(
            strval(
                (
                new Delete(
                    $this->createClient(),
                    new Concrete('http://fake.url/rest/client'),
                    new HTTP\Headers\WithAuth(
                        new ByApiKey(
                            new ApiKey(
                                "key"
                            )
                        )
                    )
                )
                )->response()
                    ->getBody()
            )
        );
    }
}
