<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Tests\Host;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Otis22\VetmanagerApi\Host\BillingUrl;
use Otis22\VetmanagerApi\Host\Domain;
use Otis22\VetmanagerApi\Host\HostNameFromGateway;
use Otis22\VetmanagerApi\VetmanagerApiException;
use PHPUnit\Framework\TestCase;

final class HostNameFromGatewayTest extends TestCase
{
    public function testHostNameWithValidUrl(): void
    {
        $mock = new MockHandler([
            new Response(
                200,
                [],
                '{
                    "protocol":"http",
                    "host":"test.kube-dev.vetmanager.cloud",
                    "url":"test.fake.url",
                    "success":true
                }'
            )
        ]);
        $handlerStack = HandlerStack::create($mock);

        $this->assertEquals(
            "test.fake.url",
            strval(
                new HostNameFromGateway(
                    new BillingUrl("https://fake.billing.url"),
                    new Domain('one'),
                    new Client(['handler' => $handlerStack])
                )
            )
        );
    }

    public function testCacheHostName(): void
    {
        $mock = new MockHandler([
            new Response(
                200,
                [],
                '{
                    "protocol":"http",
                    "host":"test.kube-dev.vetmanager.cloud",
                    "url":"test.fake.url",
                    "success":true
                }'
            )
        ]);
        $handlerStack = HandlerStack::create($mock);
        $hostName = new HostNameFromGateway(
            new BillingUrl("https://fake.billing.url"),
            new Domain('one'),
            new Client(['handler' => $handlerStack])
        );
        $this->assertEquals(
            strval($hostName),
            strval($hostName)
        );
    }
    public function testHostNameWithServerError(): void
    {
        $this->expectException(VetmanagerApiException::class);
        $mock = new MockHandler([
            new Response(
                500,
                [],
                ''
            )
        ]);
        $handlerStack = HandlerStack::create($mock);
        strval(
            new HostNameFromGateway(
                new BillingUrl("https://fake.billing.url"),
                new Domain('one'),
                new Client(['handler' => $handlerStack])
            )
        );
    }
    public function testHostNameWithUnsuccess(): void
    {
        $this->expectException(VetmanagerApiException::class);
        $mock = new MockHandler([
            new Response(
                500,
                [],
                '{success: false}'
            )
        ]);
        $handlerStack = HandlerStack::create($mock);
        strval(
            new HostNameFromGateway(
                new BillingUrl("https://fake.billing.url"),
                new Domain('one'),
                new Client(['handler' => $handlerStack])
            )
        );
    }

    public function testHostNameWithEmptyUrl(): void
    {
        $this->expectException(VetmanagerApiException::class);
        $mock = new MockHandler([
            new Response(
                200,
                [],
                '{url: "", success: "true"}'
            )
        ]);
        $handlerStack = HandlerStack::create($mock);
        strval(
            new HostNameFromGateway(
                new BillingUrl("https://fake.billing.url"),
                new Domain('one'),
                new Client(['handler' => $handlerStack])
            )
        );
    }
}
