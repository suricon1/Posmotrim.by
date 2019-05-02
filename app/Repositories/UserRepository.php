<?php

namespace App\Repositories;


use App\Models\Site\User;

class UserRepository
{
    public function get($id)
    {
        if (!$user = User::find($id)) {
            throw new \DomainException('Такой пользователь не существует.');
        }
        return $user;
    }
}