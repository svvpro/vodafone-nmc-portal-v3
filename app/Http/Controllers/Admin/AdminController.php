<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class AdminController extends Controller
{
    protected $template = false;
    protected $vars = false;
    protected $content = false;
    protected $title;
    protected $role_rep;
    protected $permission_rep;
    protected $user_rep;
    protected $service_code_type_rep;
    protected $service_code;
    protected $departament_rep;
    protected $engineer_rep;
    protected $system_rep;
    protected $category_rep;
    protected $alarm_template_type_rep;
    protected $alarm_type_agreement_rep;
    protected $alarm_template_rep;
    protected $alarm_informing_type_rep;

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
