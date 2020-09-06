<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url;

use GuzzleHttp\ClientInterface;
use Otis22\VetmanagerApi\Url;
use Otis22\VetmanagerApi\VetmanagerApiException;
use Otis22\VetmanagerApi\Url\Part\Protocol;
use Otis22\VetmanagerApi\Url\Part\Domain;

final class UrlFromBillingApiGateway implements Url
{
    /**
     * @var BillingApiUrl
     */
    private $billingApiUrl;
    /**
     * @var Domain
     */
    private $domain;
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var string
     */
    private $url;

    /**
     * UrlFromBillingApiGateway constructor.
     *
     * @param BillingApiUrl   $billingApiUrl
     * @param Domain          $domain
     * @param ClientInterface $client
     */
    public function __construct(BillingApiUrl $billingApiUrl, Domain $domain, ClientInterface $client)
    {
        $this->billingApiUrl = $billingApiUrl;
        $this->domain = $domain;
        $this->client = $client;
    }

    public function asString(): string
    {
        if (empty($this->url)) {
            $this->url = $this->urlFromApi();
        }
        return $this->url;
    }

    public function __toString(): string
    {
        return $this->asString();
    }


    private function urlFromApi(): string
    {
        try {
            $response = $this->client->request("GET", $this->hostGatewayUrl());
            $responseText = strval($response->getBody());
            $json = \json_decode($responseText);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("Invalid json response: {$responseText}");
            }
            $this->validateResponse($json);
            return $this->protocol($json) . $this->hostName($json);
        } catch (\Throwable $e) {
            throw new VetmanagerApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    private function hostGatewayUrl(): string
    {
        return $this->billingApiUrl . "/host/" . $this->domain;
    }

    /**
     * @param  \stdClass $json
     * @throws \Exception
     */
    private function validateResponse(\stdClass $json): void
    {
        if (!filter_var($json->success, FILTER_VALIDATE_BOOLEAN)) {
            throw new \Exception("Unsuccessful request");
        }
        if (empty($json->url)) {
            throw new \Exception('Url is empty');
        }
        if (empty($json->protocol)) {
            throw new \Exception('Protocol is empty');
        }
    }

    private function protocol(\stdClass $json): Protocol
    {
        return new Protocol($json->protocol);
    }

    private function hostName(\stdClass $json): string
    {
        return $json->url;
    }
}
