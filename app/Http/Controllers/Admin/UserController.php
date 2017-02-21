<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends AdminController
{
    function __construct(UserRepository $user_rep, RoleRepository $role_rep)
    {
        parent::__construct();
        $this->user_rep = $user_rep;
        $this->role_rep = $role_rep;
        $this->template = env('THEME').'.admin.user_tpl';
    }

    public function index()
    {
        $this->title = 'Менеджер пользователей';
        $users = $this->user_rep->getUsers();
        $this->content = view(env('THEME').'.admin.user_list')->with('users', $users);
        return $this->renderTemplate();
    }

    public function create()
    {

        $this->title = 'Создать пользователя';
        $roles = $this->role_rep->getRoles()->pluck('name');
        $this->content = view(env('THEME').'.admin.user_form')->with('roles', $roles);
        return $this->renderTemplate();
    }

    public function store()
    {
        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $this->title = 'Редактирова пользователя';
        $user = $this->user_rep->getUserById($id);
        $roles = $this->role_rep->getRoles()->pluck('name');
        $this->content = view(env('THEME').'.admin.user_form')->with(['roles'=>$roles, 'user'=>$user]);
        return $this->renderTemplate();
    }

}
