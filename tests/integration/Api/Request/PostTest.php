<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Request;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use Otis22\VetmanagerApi\Api\Model;
use Otis22\VetmanagerApi\Url\Part\Domain;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Url;
use Otis22\VetmanagerApi\Api\HTTP;

use function Otis22\VetmanagerApi\not_empty_env;

class PostTest extends TestCase
{

    public function testResponse(): void
    {
        $httpClient = new Client();
        $request = new Post(
            $httpClient,
            new Url\WithURI(
                new Url\FromBillingApiGateway(
                    new Url\BillingApi(
                        'https://billing-api.vetmanager.cloud'
                    ),
                    new Domain(
                        not_empty_env('TEST_DOMAIN_NAME')
                    ),
                    $httpClient
                ),
                new HTTP\URI\OnlyModel(
                    new Model("client")
                )
            ),
            new HTTP\Headers\WithAuth(
                new ByApiKey(
                    new ApiKey(
                        not_empty_env('TEST_API_KEY')
                    )
                )
            ),
            new HTTP\Body\JsonFromArray(
                [
                    'first_name' => "Test",
                    'last_name' => "Test"
                ]
            )
        );
        $json = json_decode(
            strval(
                $request->response()->getBody()
            )
        );
        $this->assertTrue($json->success);
    }
}
