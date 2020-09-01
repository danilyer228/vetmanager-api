<?php


namespace Otis22\VetmanagerApi\Api;
use Psr\Http\Message\ResponseInterface;

interface Request
{
    public function response(): ResponseInterface;
}