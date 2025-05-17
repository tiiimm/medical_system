<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalResults extends Model
{
    protected $fillable = [
        'appointment_id',
        'test_results',
        'condition',
        'additional_comments',
        'result_file_path',
        'reviewed_by',
        'uploaded_by',
        'semester',
        'school_year',
        'upload_date',
    ];

    public function studentInformation()
    {
        return $this->appointment->student_information;
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
