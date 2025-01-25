<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = [
        'medical_profile_id',
        'condition_name',
        'treatment',
        'is_chronic',
        'last_checkup',
    ];

    public function medicalProfile()
    {
        return $this->belongsTo(MedicalProfile::class);
    }
}
