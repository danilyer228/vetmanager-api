<?php


namespace Otis22\VetmanagerApi\Api;


use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Otis22\VetmanagerApi\Api\Auth\Query;
use Otis22\VetmanagerApi\Api\HTTP\URI;

class GetRequest implements Request
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var URI
     */
    private $uri;
    /**
     * @var Headers
     */
    private $headers;
    /**
     * @var Query
     */
    private $query;

    /**
     * GetRequest constructor.
     * @param ClientInterface $httpClient
     * @param URI $uri
     * @param Headers $headers
     * @param Query $query
     */
    public function __construct(ClientInterface $httpClient, URI $uri, Headers $headers, Query $query)
    {
        $this->httpClient = $httpClient;
        $this->uri = $uri;
        $this->headers = $headers;
        $this->query = $query;
    }

    /**
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function response(): ResponseInterface
    {
        return $this->httpClient->request(
            "GET",
            $this->uri->asString(),
            [
                'query' => $this->query->asAssoc(),
                'headers' => $this->headers->asAssoc()
            ]
        );
    }

}