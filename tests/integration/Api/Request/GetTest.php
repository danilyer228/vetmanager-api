<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Request;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Api\Auth\ApiKey;
use Otis22\VetmanagerApi\Api\Auth\ByApiKey;
use Otis22\VetmanagerApi\Api\Filter\EqualTo;
use Otis22\VetmanagerApi\Api\Filter\Filters;
use Otis22\VetmanagerApi\Api\Filter\StringValue;
use Otis22\VetmanagerApi\Api\Sort\AscBy;
use Otis22\VetmanagerApi\Api\Sort\Sort;
use Otis22\VetmanagerApi\Url;
use Otis22\VetmanagerApi\Url\Part\Domain;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Api\HTTP;
use Otis22\VetmanagerApi\Api\Model;

use function Otis22\VetmanagerApi\not_empty_env;

class GetTest extends TestCase
{
    public function testResponseWithoutQuery(): void
    {
        $httpClient = new Client();
        $request = new GetWithoutQuery(
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
            )
        );
        $json = json_decode(
            strval(
                $request->response()->getBody()
            )
        );
        $this->assertTrue($json->success);
    }

    public function testResponseWithSortById(): void
    {
        $httpClient = new Client();
        $request = new Get(
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
            new HTTP\Query\FromAssocify(
                new Sort(
                    new AscBy(
                        new Model\Property("id")
                    )
                )
            )
        );
        $json = json_decode(
            strval(
                $request->response()->getBody()
            )
        );
        $this->assertTrue(
            $json->data->client[0]->id == 1
        );
    }
    public function testResponseWithFil(): void
    {
        $httpClient = new Client();
        $request = new Get(
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
            new HTTP\Query\FromAssocify(
                new Filters(
                    new EqualTo(
                        new Model\Property('id'),
                        new StringValue('1')
                    )
                )
            )
        );
        $json = json_decode(
            strval(
                $request->response()->getBody()
            )
        );
        $this->assertEquals(1, $json->data->totalCount);
    }
}
