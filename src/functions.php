<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi;

use GuzzleHttp\Client;
use Otis22\VetmanagerApi\Credentials\AppName;
use Otis22\VetmanagerApi\Credentials\Login;
use Otis22\VetmanagerApi\Credentials\ByLoginPassword;
use Otis22\VetmanagerApi\Credentials\Password;
use Otis22\VetmanagerApi\Url\Part\Domain;
use Otis22\VetmanagerApi\Token;

function create_url_from_billing_api_gateway(string $domainName, string $billingApiUrl): Url
{
    return new Url\FromBillingApiGateway(
        new Url\BillingApi($billingApiUrl),
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

function credentials(string $login, string $password, string $app_name): Credentials
{
    return new ByLoginPassword(
        new Login($login),
        new Password($password),
        new AppName($app_name)
    );
}

function token(Credentials $credentials, Url $url): Token
{
    return new Token\FromGateway(
        $credentials,
        $url,
        new Client()
    );
}

function not_empty_env(string $env_name): string
{
    $value = getenv($env_name);
    if ($value === false) {
        throw new VetmanagerApiException("{$env_name} can not be empty");
    }
    return $value;
}
