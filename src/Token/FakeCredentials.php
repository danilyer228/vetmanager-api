<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Token;

final class FakeCredentials implements Credentials
{
    public function asAssoc(): array
    {
        return [
            'login' => 'test',
            'password' => 'test',
            'app_name' => 'test'
        ];
    }
}
