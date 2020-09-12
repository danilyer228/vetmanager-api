<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Request;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Otis22\VetmanagerApi\Api\HTTP\Body;
use Otis22\VetmanagerApi\Api\HTTP\Headers;
use Otis22\VetmanagerApi\Url;
use Psr\Http\Message\ResponseInterface;
use Otis22\VetmanagerApi\Api\Request;

final class Put implements Request
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Url
     */
    private $url;
    /**
     * @var Headers
     */
    private $headers;
    /**
     * @var Body
     */
    private $body;

    /**
     * Put constructor.
     * @param ClientInterface $httpClient
     * @param Url $url
     * @param Headers $headers
     * @param Body $body
     */
    public function __construct(ClientInterface $httpClient, Url $url, Headers $headers, Body $body)
    {
        $this->httpClient = $httpClient;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function response(): ResponseInterface
    {
        return $this->httpClient->request(
            "PUT",
            $this->url->asString(),
            [
                'headers' => $this->headers->asAssoc(),
                'body' => $this->body->asString()
            ]
        );
    }
}
