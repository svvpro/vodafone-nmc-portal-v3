<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 20.02.2017
 * Time: 13:48
 */

namespace App\Repositories;



use App\AlarmAgreementType;

class AlarmTypeAgreementRepository extends  Repository
{
    function __construct(AlarmAgreementType $aat)
    {
        $this->model = $aat;
    }

    /**
     * Получить все типы согласования шаблонов аварий
     * @return mixed
     */
    public function getAlarmTypesAgreement()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному типу согласования шаблона
     * @param $id
     * @return mixed
     */
    public function getAlarmTypeAgreementSingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить тип согласования шаблона
     * @param $request
     * @return array
     */
    public function addAlarmTypeAgreement($request)
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
     * Обновить тип согласования шаблона по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateAlarmTypeAgreement($request, $id)
    {
        $ata= $this->single($id);

        $data = $request->except('_token');

        if($ata->update($data))
        {
            return [
                'status' => 'Запись успешно обновлена'
            ];
        }
    }


    /**
     * Удалить тип согласования шаблона по id
     * @param $id
     * @return array
     */
    public function deleteAlarmTypeAgreement($id)
    {
        $result = $this->model->destroy($id);

        if ($result) {
            return [
                'status' => 'Запись успешно удалена'
            ];
        }
    }
}