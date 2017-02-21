<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceCodeRepository;
use Illuminate\Http\Request;

class ServiceCodeController extends SiteController
{
    public function __construct(ServiceCodeRepository $service_code_rep)
    {
        parent::__construct();
        $this->service_code_rep = $service_code_rep;
        $this->template = env('THEME') . '.service_code_tpl';
    }

    public function index()
    {
        $this->title = 'Справочник серавис кодов';

        $this->content = view(env('THEME') . '.service_codes_list');

        return $this->renderTemplate();
    }

    public function data()
    {
        $service_codes = $this->service_code_rep->getServiceCode();

        return $service_codes;
    }
}
