<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 18.02.2017
 * Time: 18:42
 */

namespace App\Repositories;


use App\Engineer;

class EngineerRepository extends Repository
{
    function __construct(Engineer $engineer)
    {
        $this->model = $engineer;
    }

    /**
     * Получить всех инженеров
     * @return mixed
     */
    public function getEngineers()
    {
        return $this->get();
    }

    /**
     * Получить данные по инженеру
     * @param $id
     * @return mixed
     */
    public function getEngineerSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить инженера
     * @param $request
     * @return array
     */
    public function addEngineer($request)
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
     * Обновить инженера по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateEngineer($request, $id)
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
     * Удалить удалить инженера по id
     * @param $id
     * @return array
     */
    public function deleteEngineer($id)
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