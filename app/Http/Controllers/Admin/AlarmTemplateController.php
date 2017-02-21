<?php

namespace App\Http\Controllers\Admin;

use App\AlarmTemplateType;
use App\Http\Requests\AlarmTemplateRequest;
use App\Http\Requests\AlarmTemplateTypeRequest;
use App\Repositories\AlarmTemplateRepository;
use App\Repositories\AlarmTemplateTypeRepository;
use App\Repositories\AlarmTypeAgreementRepository;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlarmTemplateController extends AdminController{

    function __construct(AlarmTemplateRepository $alarm_template, SystemRepository $system_rep,
AlarmTemplateTypeRepository $alarm_template_type_rep, AlarmTypeAgreementRepository $alarm_type_agreement_rep)
    {
        parent::__construct();
        $this->system_rep = $system_rep;
        $this->alarm_template_rep = $alarm_template;
        $this->alarm_template_type_rep = $alarm_template_type_rep;
        $this->alarm_type_agreement_rep = $alarm_type_agreement_rep;
        $this->template = env('THEME').'.admin.alarm_template_tpl';
    }

    public function index()
    {
        $this->title = 'Редактор шаблонов';

        $alarm_templates = $this->alarm_template_rep->getAlarmTemplates();

        $this->content = view(env('THEME').'.admin.alarm_templates_list')->with('alarm_templates', $alarm_templates);

        return $this->renderTemplate();
    }

    public function create()
    {

        $systems = $this->system_rep->getSystems()->pluck('name', 'id');

        $template_types = $this->alarm_template_type_rep->getAlarmTemplateTypes()->pluck('name', 'id');

        $agreement_types = $this->alarm_type_agreement_rep->getAlarmTypesAgreement()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.alarm_template_form')->with([
            'systems'=>$systems,
            'template_types'=>$template_types,
            'agreement_types'=>$agreement_types,
        ]);

        return $this->renderTemplate();
    }

    public function store(AlarmTemplateRequest $request)
    {
        $result = $this->alarm_template_rep->addAlarmTemplate($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-templates')->with($result);
    }

    public function edit($id)
    {

        $alarm_template = $this->alarm_template_rep->getAlarmTemplateSingle($id);

        $systems = $this->system_rep->getSystems()->pluck('name', 'id');

        $template_types = $this->alarm_template_type_rep->getAlarmTemplateTypes()->pluck('name', 'id');

        $agreement_types = $this->alarm_type_agreement_rep->getAlarmTypesAgreement()->pluck('name', 'id');


        $this->content = view(env('THEME').'.admin.alarm_template_form')->with([
            'alarm_template'=>$alarm_template,
            'systems'=>$systems,
            'template_types'=>$template_types,
            'agreement_types'=>$agreement_types,
        ]);;

        return $this->renderTemplate();
    }

    public function update(AlarmTemplateRequest  $request, $id)
    {
        $result = $this->alarm_template_rep->updateAlarmTemplate($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-templates')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->alarm_template_rep->deleteAlarmTemplate($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-templates')->with($result);
    }

}
