<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PermissionController extends AdminController
{
    function __construct(Request $request, RoleRepository $role_rep, PermissionRepository $permission_rep)
    {
        //Проверка прав доступа по привилегии 'PERMISSION_INDEX'
//        $this->middleware(function($request, $next){
//            if(Gate::denies('PERMISSION_INDEX')){
//                abort(403);
//            }
//        });

        $this->role_rep = $role_rep;
        $this->permission_rep = $permission_rep;

        parent::__construct();
        $this->template = env('THEME').'.admin.permission_tpl';
        $this->title = 'Редактор прав доступа';
    }

    public function index()
    {

        $roles = $this->role_rep->getRoles();
        $permissions = $this->permission_rep->getPermissions();

        $this->content = view(env('THEME').'.admin.permission_form')
            ->with('roles', $roles)
            ->with('permissions', $permissions);

        return $this->renderTemplate();
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $roles = $this->role_rep->getRoles();
        foreach ($roles as $role){
            if(isset($data[$role->id])){
                $role->permissions()->sync($data[$role->id]);
            }else{
                $role->permissions()->detach();
            }
        }

        return back();
    }
}
