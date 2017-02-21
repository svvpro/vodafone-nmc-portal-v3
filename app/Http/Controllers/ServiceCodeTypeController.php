<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceCodeTypeRepository;
use Illuminate\Http\Request;

class ServiceCodeTypeController extends SiteController
{
    public function __construct(ServiceCodeTypeRepository $service_code_type_rep)
    {
        parent::__construct();
        $this->service_code_type_rep = $service_code_type_rep;
    }

    public function data()
    {
        return $this->service_code_type_rep->getServiceCodeType();
    }
}
