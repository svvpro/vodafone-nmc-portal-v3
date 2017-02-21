<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 19.02.2017
 * Time: 7:40
 */

namespace App\Repositories;


use App\AlarmTemplateType;

class AlarmTemplateTypeRepository extends Repository
{
    function __construct(AlarmTemplateType $att)
    {
        $this->model = $att;
    }

    /**
     * Получить все типы шаблонов аварий
     * @return mixed
     */
    public function getAlarmTemplateTypes()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному типу шаблона
     * @param $id
     * @return mixed
     */
    public function getAlarmTemplateTypeSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить тип шаблона аварий
     * @param $request
     * @return array
     */
    public function addAlarmTemplateTypeType($request)
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
     * Обновить тип шаблона аварий  по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateAlarmTemplateType($request, $id)
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
     * Удалить тип шаблона аварий по id
     * @param $id
     * @return array
     */
    public function deleteAlarmTemplateType($id)
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