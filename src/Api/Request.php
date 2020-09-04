<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use Psr\Http\Message\ResponseInterface;

interface Request
{
    public function response(): ResponseInterface;
}
