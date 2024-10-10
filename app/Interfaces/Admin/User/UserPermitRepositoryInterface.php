<?php

namespace App\Interfaces\Admin\User;

interface UserPermitRepositoryInterface
{
    //
    public function findByName(string $name);
}
