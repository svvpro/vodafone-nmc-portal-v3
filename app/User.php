<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function canDo($permisson, $require = false)
    {
        if(is_array($permisson)){
            foreach ($permisson as $perm_name){
                $perm_name = $this->canDo($perm_name);
                if ($perm_name && $require){
                    return true;
                }else{
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->roles as $role){
                foreach ($role->permissions as $perm){
                    if (str_is($permisson, $perm->name)){
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
