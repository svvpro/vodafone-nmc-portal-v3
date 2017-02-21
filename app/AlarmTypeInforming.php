<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlarmTypeInforming extends Model
{
    protected $table = 'alarm_informing_types';
    protected $fillable = [
        'name',
        'email',
        'engineer_prefix',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
