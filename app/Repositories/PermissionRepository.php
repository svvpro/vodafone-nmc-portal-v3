<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 07.02.2017
 * Time: 23:05
 */

namespace App\Repositories;


use App\Permission;

class PermissionRepository extends Repository
{
    function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getPermissions()
    {
        return $this->get();
    }
}