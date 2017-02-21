<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 06.02.2017
 * Time: 18:21
 */

namespace App\Repositories;


use App\User;

class UserRepository extends Repository
{
    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUsers()
    {
        return $this->get();
    }

    public function getUserById($id)
    {
        return $this->single($id);
    }
}