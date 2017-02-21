<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table = 'departaments';
    protected $fillable = [
        'name'
    ];

    public function engineers()
    {
        return $this->hasMany(Engineer::class,'id');
    }
}
