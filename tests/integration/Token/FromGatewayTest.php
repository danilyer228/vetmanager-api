<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Token;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Credentials\AppName;
use Otis22\VetmanagerApi\Credentials\ByLoginPassword;
use Otis22\VetmanagerApi\Credentials\Login;
use Otis22\VetmanagerApi\Credentials\Password;
use Otis22\VetmanagerApi\Url\Part\Domain;
use PHPUnit\Framework\TestCase;
use Otis22\VetmanagerApi\Url;
use function Otis22\VetmanagerApi\not_empty_env;

class FromGatewayTest extends TestCase
{

    public function testAsString(): void
    {
        $this->assertTrue(
            strlen(
                (
                    new FromGateway(
                        new ByLoginPassword(
                            new Login('admin'),
                            new Password('123456'),
                            new AppName('myapp')
                        ),
                        new Url\FromBillingApiGateway(
                            new Url\BillingApi(
                                'https://billing-api.vetmanager.cloud'
                            ),
                            new Domain(
                                not_empty_env('TEST_DOMAIN_NAME')
                            ),
                            new Client()
                        ),
                        new Client()
                    )
                )->asString()
            ) > 5
        );
    }
}
