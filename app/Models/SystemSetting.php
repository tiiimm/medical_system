<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
        'semester',
        'school_year',
        'medical_start',
        'medical_end',
        'slots',
    ];
}
