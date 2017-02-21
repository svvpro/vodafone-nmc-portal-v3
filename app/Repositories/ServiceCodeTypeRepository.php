<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 15.02.2017
 * Time: 21:02
 */

namespace App\Repositories;


use App\ServiceCodeType;

class ServiceCodeTypeRepository extends Repository
{
    function __construct(ServiceCodeType $sct)
    {
        $this->model = $sct;
    }

    /**
     * Получить все типы сервис кодов
     * @return mixed
     */
    public function getServiceCodeType()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному сервис коду
     * @param $id
     * @return mixed
     */
    public function getServiceCodeTypeSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить сервис код
     * @param $request
     * @return array
     */
    public function addServiceCodeType($request)
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
     * Обновить сервис код по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateServiceCodeType($request, $id)
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
     * Удалить сервис код по id
     * @param $id
     * @return array
     */
    public function deleteServiceCodeType($id)
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