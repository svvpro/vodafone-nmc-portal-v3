<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EngineerRequest;
use App\Repositories\DepartamentRepositoty;
use App\Repositories\EngineerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngineerController extends AdminController
{
    function __construct(EngineerRepository $engineer_rep, DepartamentRepositoty $departamet_rep)
    {
        parent::__construct();
        $this->engineer_rep = $engineer_rep;
        $this->departament_rep = $departamet_rep;
        $this->template = env('THEME').'.admin.engineer_tpl';
    }

    public function index()
    {
        $this->title = 'Менеджер контактов';

        $engineers = $this->engineer_rep->getEngineers();

        $this->content = view(env('THEME').'.admin.engineers_list')->with('engineers', $engineers);

        return $this->renderTemplate();
    }

    public function create()
    {

        $departaments = $this->departament_rep->getDepartaments()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.engineer_form')->with('departaments', $departaments);

        return $this->renderTemplate();
    }

    public function store(EngineerRequest $request)
    {
        $result = $this->engineer_rep->addEngineer($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/engineers')->with($result);
    }

    public function edit($id)
    {
        $this->title = 'Редактор инженера';

        $engineer = $this->engineer_rep->getEngineerSingle($id);

        $departaments = $this->departament_rep->getDepartaments()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.engineer_form')->with(['engineer'=>$engineer, 'departaments'=>$departaments]);

        return $this->renderTemplate();
    }

    public function update(EngineerRequest $request, $id)
    {
        $result = $this->engineer_rep->updateEngineer($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/engineers')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->engineer_rep->deleteEngineer($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/engineers')->with($result);
    }
}
