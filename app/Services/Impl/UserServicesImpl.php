<?php

namespace App\Services\Impl;

use App\Services\UserServices;

class UserServicesImpl implements UserServices
{
    private array $users = [
        "Miftah"    => "miftah123",
        "Gadis"     => "gadis123"
    ];

    public function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password == $correctPassword;
    }
}
