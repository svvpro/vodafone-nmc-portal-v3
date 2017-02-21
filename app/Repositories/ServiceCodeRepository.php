<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 18.02.2017
 * Time: 11:15
 */

namespace App\Repositories;


use App\ServiceCode;

class ServiceCodeRepository extends Repository
{
    function __construct(ServiceCode $service_code)
    {
        $this->model = $service_code;
    }

    /**
     * Получить все сервис коды
     * @return mixed
     */
    public function getServiceCode()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному сервис коду
     * @param $id
     * @return mixed
     */
    public function getServiceCodeSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить сервис код
     * @param $request
     * @return array
     */
    public function addServiceCode($request)
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
    public function updateServiceCode($request, $id)
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
    public function deleteServiceCode($id)
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