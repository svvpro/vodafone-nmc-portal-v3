<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission, $require = false)
    {
        if(is_array($permission)){
            foreach ($permission as $perm_name){
                $perm_name = $this->hasPermission($perm_name);
                if(!$perm_name && $require){
                    return true;
                }else if($perm_name && !$require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->permissions as $perm){
                if ($perm->name == $permission){
                    return true;
                }
            }
        }
        return false;
    }
}
