<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 18.02.2017
 * Time: 22:44
 */

namespace App\Repositories;


use App\System;

class SystemRepository extends Repository
{
    function __construct(System $system)
    {
        $this->model = $system;
    }

    /**
     * Получить все данные системах
     * @return mixed
     */
    public function getSystems()
    {
        return $this->get();
    }

    /**
     * Получить данные по одной системе
     * @param $id
     * @return mixed
     */
    public function getSystemSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить данные о системе
     * @param $request
     * @return array
     */
    public function addSystem($request)
    {
        $data = $request->except('_token');

        if ($this->model->fill($data)->save()) {
            return [
                'status' => 'Запись успешно добавлена'
            ];
        }
    }

    /**
     * Обновить данные по системе по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateSystem($request, $id)
    {
        $sct = $this->single($id);

        $data = $request->except('_token');

        if ($sct->update($data)) {
            return [
                'status' => 'Запись успешно обновлена'
            ];
        }
    }


    /**
     * Удалить данные о системе по id
     * @param $id
     * @return array
     */
    public function deleteSystem($id)
    {
        $result = $this->model->destroy($id);

        if ($result) {
            return [
                'status' => 'Запись успешно удалена'
            ];
        }
    }
}