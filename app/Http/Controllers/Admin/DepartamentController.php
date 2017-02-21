<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartamentRequest;
use App\Repositories\DepartamentRepositoty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartamentController extends AdminController
{
    function __construct(DepartamentRepositoty $departament_rep)
    {
        parent::__construct();

        $this->departament_rep = $departament_rep;
        $this->template = env('THEME').'.admin.departament_tpl';
    }

    public function index()
    {

        $this->title = 'Редактор отделов';

        $departaments = $this->departament_rep->getDepartaments();

        $this->content = view(env('THEME').'.admin.departaments_list')->with('departaments', $departaments);

        return $this->renderTemplate();
    }

    public function create()
    {

        $this->content = view(env('THEME').'.admin.departament_form');

        return $this->renderTemplate();
    }

    public function store(DepartamentRequest $request)
    {
        $result = $this->departament_rep->addDepartament($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/departaments')->with($result);
    }

    public function edit($id)
    {

        $departament = $this->departament_rep->getDepartamentSingle($id);

        $this->content = view(env('THEME').'.admin.departament_form')->with('departament', $departament);

        return $this->renderTemplate();
    }

    public function update(DepartamentRequest $request, $id)
    {
        $result = $this->departament_rep->updateDepartament($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/departaments')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->departament_rep->deleteDepartament($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/departaments')->with($result);
    }
}
