<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 06.02.2017
 * Time: 18:19
 */

namespace App\Repositories;


abstract class Repository
{
    protected $model;


    protected function get($fields='*')
    {
        $result = $this->model->select($fields);

        return $result->get();
    }

    protected function single($id, $fields ='*')
    {
        $result = $this->model->select($fields)->where('id', $id);

        return $result->first();
    }
}