<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url;

use Otis22\VetmanagerApi\Api\HTTP\URI;
use Otis22\VetmanagerApi\Url;

final class UrlWithURI implements Url
{
    /**
     * @var Url
     */
    private $url;
    /**
     * @var URI
     */
    private $uri;

    /**
     * UrlWithURI constructor.
     * @param Url $url
     * @param URI $uri
     */
    public function __construct(Url $url, URI $uri)
    {
        $this->url = $url;
        $this->uri = $uri;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->url . $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
