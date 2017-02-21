<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCode extends Model
{
    protected $table = 'service_codes';
    protected $fillable = [
        'name',
        'code_id',
        'sct_id'
    ];

    public function serviceCodeType()
    {
        return $this->belongsTo(ServiceCodeType::class, 'sct_id');
    }
}
