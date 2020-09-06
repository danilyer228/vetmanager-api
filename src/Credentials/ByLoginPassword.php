<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Credentials;

use Otis22\VetmanagerApi\Credentials;

final class ByLoginPassword implements Credentials
{
    /**
     * @var Login
     */
    private $login;
    /**
     * @var Password
     */
    private $password;
    /**
     * @var AppName
     */
    private $appName;

    /**
     * Credentials constructor.
     * @param Login $login
     * @param Password $password
     * @param AppName $appName
     */
    public function __construct(Login $login, Password $password, AppName $appName)
    {
        $this->login = $login;
        $this->password = $password;
        $this->appName = $appName;
    }

    /**
     * @inheritDoc
     */
    public function asAssoc(): array
    {
        return [
            "login" => strval($this->login),
            "password" => strval($this->password),
            "app_name" => strval($this->appName),
        ];
    }
}
