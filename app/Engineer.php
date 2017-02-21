<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    protected $table = 'engineers';
    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'pbx',
        'mobile_phone',
        'email',
        'departament_id'
    ];

    public function departament()
    {
        return $this->belongsTo(Departament::class, 'departament_id');
    }
}
