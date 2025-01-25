<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'appointment_number',
        'appointment_date',
        'appointment_schedule',
        'school_year',
        'semester',
        'status',
        'remarks',
        'purpose'
    ];

    public function student_information()
    {
        return $this->hasOneThrough(StudentInformation::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    public function medical_results() {
        return $this->hasMany(MedicalResults::class);
    }

    public function logs() {
        return $this->hasMany(AppointmentLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
