<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 20.02.2017
 * Time: 14:37
 */

namespace App\Repositories;


use App\AlarmTemplate;

class AlarmTemplateRepository extends Repository
{
    function __construct(AlarmTemplate $alarm_template)
    {
        $this->model = $alarm_template;
    }

    /**
     * Получить все шаблоны аварий
     * @return mixed
     */
    public function getAlarmTemplates()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному шаблону аварий
     * @param $id
     * @return mixed
     */
    public function getAlarmTemplateSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить шаблон аварий
     * @param $request
     * @return array
     */
    public function addAlarmTemplate($request)
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
     * Обновить шаблон аварий по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateAlarmTemplate($request, $id)
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
     * Удалить шаблон аварий по id
     * @param $id
     * @return array
     */
    public function deleteAlarmTemplate($id)
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