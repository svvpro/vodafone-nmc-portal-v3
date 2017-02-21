<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCodeType extends Model
{
    protected $table = 'service_code_types';
    protected $fillable = [
        'name'
    ];

    public function serviceCodes()
    {
        return $this->hasMany(ServiceCode::class, 'sct_id');
    }

}
