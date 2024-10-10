<?php

namespace App\Policies\Admin;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('view_user_permits'); // 권한 확인
    }

    public function view(User $user)
    {
        return $user->hasPermission('view_user_permit');
    }

    public function create(User $user)
    {
        return $user->hasPermission('create_user_permit');
    }

    public function update(User $user)
    {
        return $user->hasPermission('update_user_permit');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('delete_user_permit');
    }
}
