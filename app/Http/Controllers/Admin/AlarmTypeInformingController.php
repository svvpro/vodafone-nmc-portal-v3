<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlarmTypeInformingRequest;
use App\Repositories\AlarmTypeInformingRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlarmTypeInformingController extends AdminController 
{
    function __construct(AlarmTypeInformingRepository $alarm_informing_type_rep, CategoryRepository $category_rep)
    {
        parent::__construct();
        
        $this->alarm_informing_type_rep= $alarm_informing_type_rep;
        $this->category_rep = $category_rep;
        
        $this->template = env('THEME').'.admin.alarm_informing_type_tpl';
    }

    public function index()
    {
        $this->title = 'Редактор типов информирования';

        $aits = $this->alarm_informing_type_rep->getAlarmInformingTypes();

        $this->content = view(env('THEME').'.admin.alarm_informing_types_list')->with('aits', $aits);
        return $this->renderTemplate();
    }

    public function create()
    {

        $categories = $this->category_rep->getCategories()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.alarm_informing_type_form')->with('categories', $categories);

        return $this->renderTemplate();
    }

    public function store(AlarmTypeInformingRequest $request)
    {

        $result = $this->alarm_informing_type_rep->addAlarmInformingType($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-informing-types')->with($result);
    }

    public function edit($id)
    {

        $ait = $this->alarm_informing_type_rep->getAlarmInformingTypeSingle($id);

        $categories = $this->category_rep->getCategories()->pluck('name', 'id');

        $this->content = view(env('THEME').'.admin.alarm_informing_type_form')->with([
            'ait'=>$ait,
            'categories'=>$categories
        ]);

        return $this->renderTemplate();
    }

    public function update(AlarmTypeInformingRequest $request, $id)
    {
        $result = $this->alarm_informing_type_rep->updateAlarmInformingType($request, $id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-informing-types')->with($result);
    }

    public function destroy($id)
    {

        $result = $this->alarm_informing_type_rep->deleteAlarmInformingType($id);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/alarm-informing-types')->with($result);
    }
}
