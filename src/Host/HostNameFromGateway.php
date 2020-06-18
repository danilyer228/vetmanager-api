<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Host;

use GuzzleHttp\ClientInterface;
use Otis22\VetmanagerApi\VetmanagerApiException;
use Psr\Http\Message\ResponseInterface;

final class HostNameFromGateway implements HostName
{
    /**
     * @var BillingUrl
     */
    private $billingUrl;
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
    private $hostNameCache;

    /**
     * HostNameFromGateway constructor.
     * @param BillingUrl $billingUrl
     * @param Domain $domain
     * @param ClientInterface $client
     */
    public function __construct(BillingUrl $billingUrl, Domain $domain, ClientInterface $client)
    {
        $this->billingUrl = $billingUrl;
        $this->domain = $domain;
        $this->client = $client;
    }

    /**
     * @return string
     * @throws VetmanagerApiException
     */
    public function __toString(): string
    {
        if (empty($this->hostNameCache)) {
            $this->hostNameCache = $this->hostName();
        }
        return $this->hostNameCache;
    }

    /**
     * @return string
     * @throws VetmanagerApiException
     */
    private function hostName(): string
    {
        try {
            $response = $this->client->request("GET", $this->hostGatewayUrl());
            return $this->urlFromResponse($response);
        } catch (\Throwable $e) {
            throw new VetmanagerApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    private function urlFromResponse(ResponseInterface $response): string
    {
        $responseText = strval($response->getBody());
        $json = \json_decode($responseText);
        if (is_null($json)) {
            throw new \Exception("Invalid json response: " . $responseText);
        }
        if (!filter_var($json->success, FILTER_VALIDATE_BOOLEAN)) {
            throw new \Exception("Unsuccessful request: " . $responseText);
        }
        if (empty($json->url)) {
            throw new \Exception('Url is empty: ' . $responseText);
        }
        return $json->url;
    }

    private function hostGatewayUrl(): string
    {
        return $this->billingUrl . "/host/" . $this->domain;
    }
}
