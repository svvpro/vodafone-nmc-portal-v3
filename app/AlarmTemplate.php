<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlarmTemplate extends Model
{
    protected $table = 'alarm_templates';
    protected $fillable = [
        'text',
        'system_id',
        'agreement_type_id',
        'template_type_id'
    ];

    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }

    public function agreementType()
    {
        return $this->belongsTo(AlarmTypeAgreemet::class, 'agreement_type_id');
    }

    public function templateType()
    {
        return $this->belongsTo(AlarmTemplateType::class, 'template_type_id');
    }
}
