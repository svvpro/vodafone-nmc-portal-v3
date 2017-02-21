<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 07.02.2017
 * Time: 21:31
 */

namespace App\Repositories;


use App\Role;

class RoleRepository extends Repository
{
    function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getRoles()
    {
        return $this->model->get();
    }
}