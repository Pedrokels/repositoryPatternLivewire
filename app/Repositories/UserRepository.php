<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }
    public function getAllUsers()
    {
        return User::latest()->get();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function editUser($id, array $data)
    {
        return User::find($id)->update($data);
    }
}
