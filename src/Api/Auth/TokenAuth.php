<?php


namespace Otis22\VetmanagerApi\Api\Auth;

use Otis22\VetmanagerApi\Api\Auth;
use Otis22\VetmanagerApi\Token;

class TokenAuth implements Auth
{
    /**
     * @var Token\AppName
     */
    private $appName;
    /**
     * @var Token
     */
    private $token;

    /**
     * TokenAuth constructor.
     * @param Token\AppName $appName
     * @param Token $token
     */
    public function __construct(Token\AppName $appName, Token $token)
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
            'X-USER-TOKEN'=> strval($this->token)
        ];
    }
}