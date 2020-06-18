<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Url\BillingApiUrl;
use Otis22\VetmanagerApi\Url\Domain;
use Otis22\VetmanagerApi\Url\UrlFromBillingApiGateway;

function create_url_from_billing_api_gateway(string $domainName, string $billingApiUrl): Url
{
    return new UrlFromBillingApiGateway(
        new BillingApiUrl($billingApiUrl),
        new Domain($domainName),
        new Client()
    );
}

function url(string $domainName): Url
{
    return create_url_from_billing_api_gateway($domainName, "https://billing-api.vetmanager.cloud");
}

function url_test_env(string $domainName): Url
{
    return create_url_from_billing_api_gateway($domainName, "https://billing-api-test.kube-dev.vetmanager.cloud/");
}
