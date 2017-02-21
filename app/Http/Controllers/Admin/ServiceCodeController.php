<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceCodeRequest;
use App\Repositories\ServiceCodeRepository;
use App\Repositories\ServiceCodeTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceCodeController extends AdminController
{
    function __construct(ServiceCodeRepository $service_code_rep, ServiceCodeTypeRepository $service_code_type_rep)
    {
        parent::__construct();
        $this->service_code_rep = $service_code_rep;
        $this->departament_rep = $service_code_type_rep;
        $this->template = env('THEME').'.admin.service_code_tpl';
    }

    public function index()
    {
        $this->title = 'Редактор сервис кодов';

        $service_codes = $this->service_code_rep->getServiceCode();

        $this->content = view(env('THEME').'.admin.service_code_list')->with('service_codes', $service_codes);
        return $this->renderTemplate();
    }

    public function create()
    {
        $servise_code_type = $this->departament_rep->getServiceCodeType()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.service_code_form')->with('service_code_type', $servise_code_type);

        return $this->renderTemplate();
    }

    public function store(ServiceCodeRequest $request)
    {
        $result = $this->service_code_rep->addServiceCode($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/service-codes')->with($result);
    }

    public function edit($id)
    {

        $service_code = $this->service_code_rep->getServiceCodeSingle($id);

        $service_code_type = $this->departament_rep->getServiceCodeType()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.service_code_form')->with(['service_code'=>$service_code, 'service_code_type'=>$service_code_type]);

        return $this->renderTemplate();
    }

    public function update(ServiceCodeRequest $request, $id)
    {
        $result = $this->service_code_rep->updateServiceCode($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/service-codes')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->service_code_rep->deleteServiceCode($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/service-codes')->with($result);
    }
}
