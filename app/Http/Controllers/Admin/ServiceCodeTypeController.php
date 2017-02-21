<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartamentRequest;
use App\Http\Requests\ServiceCodeTypeRequest;
use App\Repositories\ServiceCodeTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceCodeTypeController extends AdminController
{
    function __construct(ServiceCodeTypeRepository $service_code_type_rep)
    {
        parent::__construct();
        $this->service_code_type_rep = $service_code_type_rep;
        $this->template = env('THEME').'.admin.service_code_type_tpl';
    }

    public function index()
    {
        $this->title = 'Редактор типов сервис кодов';
        $scts = $this->service_code_type_rep->getServiceCodeType();

        $this->content = view(env('THEME').'.admin.service_code_type_list')->with('scts', $scts);
        return $this->renderTemplate();
    }

    public function create()
    {

        $this->content = view(env('THEME').'.admin.service_code_type_form');

        return $this->renderTemplate();
    }

    public function store(ServiceCodeTypeRequest $request)
    {
        $result = $this->service_code_type_rep->addServiceCodeType($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/service-code-types')->with($result);
    }

    public function edit($id)
    {

        $sct = $this->service_code_type_rep->getServiceCodeTypeSingle($id);

        $this->content = view(env('THEME').'.admin.service_code_type_form')->with('sct', $sct);

        return $this->renderTemplate();
    }

    public function update(ServiceCodeTypeRequest $request, $id)
    {
        $result = $this->service_code_type_rep->updateServiceCodeType($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/service-code-types')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->service_code_type_rep->deleteServiceCodeType($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/service-code-types')->with($result);
    }
}
