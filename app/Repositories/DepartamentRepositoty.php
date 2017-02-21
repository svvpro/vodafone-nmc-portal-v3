<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 18.02.2017
 * Time: 15:00
 */

namespace App\Repositories;


use App\Departament;

class DepartamentRepositoty extends Repository
{
    function __construct(Departament $departament)
    {
        $this->model = $departament;
    }

    /**
     * Получить все департаменты
     * @return mixed
     */
    public function getDepartaments()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному департаменту
     * @param $id
     * @return mixed
     */
    public function getDepartamentSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить департамент
     * @param $request
     * @return array
     */
    public function addDepartament($request)
    {
        $data = $request->except('_token');

        if($this->model->fill($data)->save())
        {
            return [
                'status' => 'Запись успешно добавлена'
            ];
        }
    }

    /**
     * Обновить департамент по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateDepartament($request, $id)
    {
        $sct = $this->single($id);

        $data = $request->except('_token');

        if($sct->update($data))
        {
            return [
                'status' => 'Запись успешно обновлена'
            ];
        }
    }


    /**
     * Удалить удалить департамент по id
     * @param $id
     * @return array
     */
    public function deleteDepartament($id)
    {
        $result = $this->model->destroy($id);

        if($result)
        {
            return [
                'status' => 'Запись успешно удалена'
            ];
        }
    }
}