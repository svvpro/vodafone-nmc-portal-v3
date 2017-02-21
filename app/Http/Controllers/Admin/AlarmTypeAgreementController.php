<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlarmTypeAgreemenRequest;
use App\Repositories\AlarmTypeAgreementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlarmTypeAgreementController extends AdminController 
{
    function __construct(AlarmTypeAgreementRepository $alarm_type_agreement_rep)
    {
        parent::__construct();
        $this->alarm_type_agreement_rep = $alarm_type_agreement_rep;
        $this->template = env('THEME').'.admin.alarm_type_agreement_tpl';
    }

    public function index()
    {

        $this->title = 'Редактор типа согласования шаблона';

        $atas = $this->alarm_type_agreement_rep->getAlarmTypesAgreement();

        $this->content = view(env('THEME').'.admin.alarm_types_agreement_list')->with('atas', $atas);
        return $this->renderTemplate();
    }

    public function create()
    {

        $this->content = view(env('THEME').'.admin.alarm_type_agreement_form');

        return $this->renderTemplate();
    }

    public function store(AlarmTypeAgreemenRequest $request)
    {
        $result = $this->alarm_type_agreement_rep->addAlarmTypeAgreement($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-agreement-types')->with($result);
    }

    public function edit($id)
    {

        $att = $this->alarm_type_agreement_rep->getAlarmTypeAgreementSingle($id);

        $this->content = view(env('THEME').'.admin.alarm_type_agreement_form')->with('ata', $att);

        return $this->renderTemplate();
    }

    public function update(AlarmTypeAgreemenRequest $request, $id)
    {
        $result = $this->alarm_type_agreement_rep->updateAlarmTypeAgreement($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-agreement-types')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->alarm_type_agreement_rep->deleteAlarmTypeAgreement($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-agreement-types')->with($result);
    }
}
