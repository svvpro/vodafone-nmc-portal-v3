<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlarmTemplateType extends Model
{
    protected $table = 'alarm_template_types';
    protected $fillable = [
        'name',
    ];
}
