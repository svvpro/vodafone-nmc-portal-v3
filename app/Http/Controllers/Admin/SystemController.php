<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SystemRequest;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends AdminController
{
    function __construct(SystemRepository $system_rep)
    {
        parent::__construct();
        $this->system_rep = $system_rep;
        $this->template = env('THEME').'.admin.system_tpl';
    }

    public function index()
    {
        $this->title = 'Редактор систем';

        $systems = $this->system_rep->getSystems();

        $this->content = view(env('THEME').'.admin.systems_list')->with('systems', $systems);
        return $this->renderTemplate();
    }

    public function create()
    {
        $this->content = view(env('THEME').'.admin.system_form');

        return $this->renderTemplate();
    }

    public function store(SystemRequest $request)
    {
        $result = $this->system_rep->addSystem($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/systems')->with($result);
    }

    public function edit($id)
    {

        $system = $this->system_rep->getSystemSingle($id);

        $this->content = view(env('THEME').'.admin.system_form')->with('system',$system);

        return $this->renderTemplate();
    }

    public function update(SystemRequest $request, $id)
    {
        $result = $this->system_rep->updateSystem($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/systems')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->system_rep->deleteSystem($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/systems')->with($result);
    }
}
