<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Auth;

use Otis22\VetmanagerApi\Api\Auth;
use Otis22\VetmanagerApi\Token;
use Otis22\VetmanagerApi\Credentials\AppName;

final class ByToken implements Auth
{
    /**
     * @var AppName
     */
    private $appName;
    /**
     * @var Token
     */
    private $token;

    /**
     * TokenAuth constructor.
     * @param AppName $appName
     * @param Token $token
     */
    public function __construct(AppName $appName, Token $token)
    {
        $this->appName = $appName;
        $this->token = $token;
    }


    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return [
            'X-APP-NAME' => strval($this->appName),
            'X-USER-TOKEN' => strval($this->token)
        ];
    }
}
