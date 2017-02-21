<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends SiteController
{
    function __construct()
    {
        parent::__construct();
        $this->template = env('THEME').'.index';
    }

    public function index()
    {


        return $this->renderTemplate();
    }
}
