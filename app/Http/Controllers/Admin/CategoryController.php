<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends AdminController
{
    function __construct(CategoryRepository $category_rep)
    {
        parent::__construct();

        $this->category_rep = $category_rep;
        $this->template = env('THEME').'.admin.category_tpl';
    }

    public function index()
    {

        $this->title = 'Редактор типов категорий';

        $categories = $this->category_rep->getCategories();

        $this->content = view(env('THEME').'.admin.categories_list')->with('categories', $categories);

        return $this->renderTemplate();
    }

    public function create()
    {

        $this->content = view(env('THEME').'.admin.category_form');

        return $this->renderTemplate();
    }

    public function store(CategoryRequest $request)
    {

        $result = $this->category_rep->addCategory($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/categories')->with($result);
    }

    public function edit($id)
    {


        $category = $this->category_rep->getCategorySingle($id);

        $this->content = view(env('THEME').'.admin.category_form')->with('category', $category);

        return $this->renderTemplate();
    }

    public function update(CategoryRequest $request, $id)
    {
        $result = $this->category_rep->updateCategory($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/categories')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->category_rep->deleteCategory($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/categories')->with($result);
    }
}
