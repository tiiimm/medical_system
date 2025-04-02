<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'campus_id', 'program_id', 'major_id', 'year_level', 'status'
    ];

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function major() {
        return $this->belongsTo(Major::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function campus() {
        return $this->belongsTo(Campus::class);
    }
    
    public function medical_results()
    {
        return $this->hasManyThrough(MedicalResults::class, Appointment::class, 'user_id', 'appointment_id', 'user_id', 'id');
    }
}
