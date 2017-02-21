<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlarmTemplateTypeRequest;
use App\Repositories\AlarmTemplateTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlarmTemplateTypeController extends AdminController
{
    function __construct(AlarmTemplateTypeRepository $alarm_template_type_rep)
    {
        parent::__construct();
        $this->alarm_template_type_rep = $alarm_template_type_rep;
        $this->template = env('THEME').'.admin.alarm_template_type_tpl';
    }

    public function index()
    {
        $atts = $this->alarm_template_type_rep->getAlarmTemplateTypes();

        $this->content = view(env('THEME').'.admin.alarm_template_types_list')->with('atts', $atts);
        return $this->renderTemplate();
    }

    public function create()
    {

        $this->content = view(env('THEME').'.admin.alarm_template_type_form');

        return $this->renderTemplate();
    }

    public function store(AlarmTemplateTypeRequest $request)
    {
        $result = $this->alarm_template_type_rep->addAlarmTemplateTypeType($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-template-types')->with($result);
    }

    public function edit($id)
    {

        $att = $this->alarm_template_type_rep->getAlarmTemplateTypeSingle($id);

        $this->content = view(env('THEME').'.admin.alarm_template_type_form')->with('att', $att);

        return $this->renderTemplate();
    }

    public function update(AlarmTemplateTypeRequest $request, $id)
    {
        $result = $this->alarm_template_type_rep->updateAlarmTemplateType($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-template-types')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->alarm_template_type_rep->deleteAlarmTemplateType($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-template-types')->with($result);
    }
}
