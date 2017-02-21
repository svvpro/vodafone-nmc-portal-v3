<?php

namespace App\Http\Controllers;

use App\Repositories\DepartamentRepositoty;
use Illuminate\Http\Request;

class DepartamentController extends SiteController
{
    public function __construct(DepartamentRepositoty $departament_rep)
    {
        parent::__construct();
        $this->departament_rep = $departament_rep;
    }

    public function data()
    {
        return $this->departament_rep->getDepartaments();
    }
}
