<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 20.02.2017
 * Time: 17:38
 */

namespace App\Repositories;


use App\AlarmTypeInforming;

class AlarmTypeInformingRepository extends Repository
{
    function __construct(AlarmTypeInforming $alarm_type_informing)
    {
        $this->model = $alarm_type_informing;
    }

    /**
     * Получить все все типы информирования
     * @return mixed
     */
    public function getAlarmInformingTypes()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному типу информирования
     * @param $id
     * @return mixed
     */
    public function getAlarmInformingTypeSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить тип информирования
     * @param $request
     * @return array
     */
    public function addAlarmInformingType($request)
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
     * Обновить тип информирования по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateAlarmInformingType($request, $id)
    {
        $alarm_template = $this->single($id);

        $data = $request->except('_token');

        if($alarm_template->update($data))
        {
            return [
                'status' => 'Запись успешно обновлена'
            ];
        }
    }


    /**
     * Удалить тип информирования  по id
     * @param $id
     * @return array
     */
    public function deleteAlarmInformingType($id)
    {
        $result = $this->model->destroy($id);

        if ($result) {
            return [
                'status' => 'Запись успешно удалена'
            ];
        }
    }
}