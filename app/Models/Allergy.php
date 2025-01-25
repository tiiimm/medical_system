<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $fillable = [
        'medical_profile_id',
        'allergy_name',
        'triggers',
    ];

    public function medicalProfile()
    {
        return $this->belongsTo(MedicalProfile::class);
    }
}
