<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\HTTP\Body;

use Otis22\VetmanagerApi\VetmanagerApiException;
use Otis22\VetmanagerApi\Api\HTTP\Body;

final class JsonFromArray implements Body
{
    /**
     * @var array <mixed>
     */
    private $data;
    /**
     * @var string
     */
    private $json;

    /**
     * JsonFromArray constructor.
     * @param array <mixed> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        if (empty($this->json)) {
            $json = json_encode($this->data);
            if ($json === false) {
                throw new VetmanagerApiException("Can't encode data to json");
            }
            $this->json = $json;
        }
        return $this->json;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
