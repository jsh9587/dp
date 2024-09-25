<?php

namespace App\Interfaces\Admin\User;

use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{
    //
    public function hasUserPermission(int $userId, string $permission): bool;
    public function users(): Collection;
}
