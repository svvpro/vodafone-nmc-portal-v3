<?php
/**
 * Created by PhpStorm.
 * User: svv
 * Date: 18.02.2017
 * Time: 23:17
 */

namespace App\Repositories;


use App\Category;

class CategoryRepository extends Repository
{
    function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Получить все типы категорий
     * @return mixed
     */
    public function getCategories()
    {
        return $this->get();
    }

    /**
     * Получить данные по одному типу категории
     * @param $id
     * @return mixed
     */
    public function getCategorySingle($id)
    {
        return $this->single($id);
    }

    /**
     * Добавить добавить категорию
     * @param $request
     * @return array
     */
    public function addCategory($request)
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
     * Обновить тип категории по id
     * @param $request
     * @param $id
     * @return array
     */
    public function updateCategory($request, $id)
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
     * Удалить категорию по id
     * @param $id
     * @return array
     */
    public function deleteCategory($id)
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