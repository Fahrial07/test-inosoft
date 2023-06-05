<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{

    public function createUser($data)
    {
        return User::create($data);
    }

    public function getUsers()
    {
        return User::get();
    }


    /**
     * @param int $id
     * @return User
     */
    public function getUserById($id)
    {
        return User::firstWhere('_id', $id);
    }

    public function getUserByEmail($email)
    {
        return User::firstWhere('email', $email);
    }

}
