<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use Otis22\VetmanagerApi\Api\HTTP\Headers\WithAuth;
use Otis22\VetmanagerApi\Api\HTTP\URI\OnlyModel;
use PHPUnit\Framework\TestCase;

class GetRequestTest extends TestCase
{

    public function testResponse(): void
    {
        $request = new GetRequest(
            new Client(),
            new OnlyModel(
                new Model("client")
            ),
            new WithAuth(
                new ByApiKey(
                    new ApiKey(getenv('TEST_API_KEY'))
                )
            )
        );
    }
}
