<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Host\BillingUrl;
use Otis22\VetmanagerApi\Host\Domain;
use Otis22\VetmanagerApi\Host\HostNameFromGateway;

function url(string $domainName): Url
{
    return new Url(
        new Protocol("https"),
        new HostNameFromGateway(
            new BillingUrl("https://billing-api.vetmanager.cloud"),
            new Domain($domainName),
            new Client()
        )
    );
}
