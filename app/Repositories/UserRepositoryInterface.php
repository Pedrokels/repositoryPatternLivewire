<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function createUser(array $data);
    public function deleteUser($id);
    public function getAllUsers();
    public function getUserById($id);
    public function editUser($id, array $data);
}
