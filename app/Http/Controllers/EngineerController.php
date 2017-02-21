<?php

namespace App\Http\Controllers;

use App\Repositories\EngineerRepository;
use Illuminate\Http\Request;

class EngineerController extends SiteController
{
    public function __construct(EngineerRepository $engineer_rep)
    {
        parent::__construct();
        $this->engineer_rep =$engineer_rep;
        $this->template = env('THEME').'.engineer_tpl';
    }

    public function index()
    {
        $this->content = view(env('THEME').'.engineers_list');
        return $this->renderTemplate();
    }

    public function data()
    {
        $engineers = $this->engineer_rep->getEngineers();

        //Заменить в выборке идентификатор департамента на его название
        $collection = $engineers->each(function ($engineer, $key) {
            $engineer->departament_id = $engineer->departament->name;
        });
        return $collection;
    }
}
