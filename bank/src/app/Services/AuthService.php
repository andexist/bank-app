<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

/**
 * Class AuthService
 */
class AuthService
{
    /**
     * @param string $username
     * @param string $password
     * @return string|null
     */
    public function getApiToken(string $username, string $password): ?string
    {
        $token = null;

        $isAuth = $this->checkLogin($username, $password);

        if ($isAuth) {
            // make token
            $token = $this->buildToken($username, $password);
        }

        return $token;
    }


    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    private function checkLogin(string $username, string $password): bool
    {
        $isAuth = true;

        $conditions = [
            $username === config('auth.api_token.username'),
            $password === config('auth.api_token.password'),
        ];

        if (in_array(false, $conditions)) {
            $isAuth = false;
        }

        return $isAuth;
    }

    /**
     * @param string $username
     * @param string $password
     * @return String
     */
    private function buildToken(string $username, string $password): string
    {
        // @ToDo improve token

        return sha1($username . $password);
    }
}
