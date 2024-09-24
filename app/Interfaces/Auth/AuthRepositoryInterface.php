<?php
namespace App\Interfaces\Auth;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function authenticate(string $email, string $password): ?User;
}
