<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class SiteController extends Controller
{
    protected $template = false;
    protected $vars = false;
    protected $title = false;
    protected $content = false;
    protected $service_code_rep;
    protected $service_code_type_rep;
    protected $engineer_rep;
    protected $departament_rep;


    function __construct()
    {
    }

    protected function renderTemplate()
    {
        $this->vars = array_add($this->vars, 'title', $this->title);
        $this->vars = array_add($this->vars, 'content', $this->content);
        return view($this->template)->with($this->vars);
    }

}
