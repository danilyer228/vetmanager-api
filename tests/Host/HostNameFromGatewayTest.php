<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Host;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Host\BillingUrl;
use Otis22\VetmanagerApi\Host\Domain;
use Otis22\VetmanagerApi\Host\HostNameFromGateway;
use PHPUnit\Framework\TestCase;

final class HostNameFromGatewayTest extends TestCase
{
    public function testHostNameWithValidUrl(): void
    {
        $this->assertEquals(
            "https://ua.vetmanager.ru",
            strval(
                new HostNameFromGateway(
                    new BillingUrl("https://billing-api-test.kube-dev.vetmanager.cloud"),
                    new Domain('one'),
                    new Client()
                )
            )
        );
    }
}
