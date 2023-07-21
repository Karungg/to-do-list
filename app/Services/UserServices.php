<?php

namespace App\Services;

interface UserServices
{
    public function login(string $user, string $password): bool;
}
