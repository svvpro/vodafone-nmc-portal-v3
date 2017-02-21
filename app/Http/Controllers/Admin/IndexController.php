<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class IndexController extends AdminController
{
    function __construct(Request $request)
    {
        $this->middleware(function($request, $next){
            if (Gate::denies('SHOW_ADMIN')){
                abort(403);
            }
            return $next($request);
        });

        parent::__construct();
        $this->title = 'Панель администратора';
        $this->template = env('THEME').'.admin.index';
    }

    public function index()
    {
        return $this->renderTemplate();
    }
}
