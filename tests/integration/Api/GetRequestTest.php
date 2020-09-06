<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use Otis22\VetmanagerApi\Api\HTTP\Query;
use Otis22\VetmanagerApi\Url\BillingApiUrl;
use Otis22\VetmanagerApi\Url\Part\Domain;
use Otis22\VetmanagerApi\Url\UrlFromBillingApiGateway;
use Otis22\VetmanagerApi\Url\UrlWithURI;
use PHPUnit\Framework\TestCase;

use function Otis22\VetmanagerApi\not_empty_env;

class GetRequestTest extends TestCase
{
    public function testResponse(): void
    {
        $httpClient = new Client();
        $request = new GetRequest(
            $httpClient,
            new UrlWithURI(
                new UrlFromBillingApiGateway(
                    new BillingApiUrl(
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
            new Query([])
        );
        $json = json_decode(
            strval(
                $request->response()->getBody()
            )
        );
        $this->assertTrue($json->success);
    }
}
