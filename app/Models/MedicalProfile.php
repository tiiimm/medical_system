<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'profile_id', 'birthdate', 'sex', 'blood_type'
    ];

    public function emergency_contact(){
        return $this->hasOne(EmergencyContact::class);
    }

    public function medical_histories(){
        return $this->hasMany(MedicalHistory::class);
    }

    public function allergies(){
        return $this->hasMany(Allergy::class);
    }
}
