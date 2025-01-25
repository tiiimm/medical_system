<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalResults extends Model
{
    protected $fillable = [
        'appointment_id',
        'hematology_result',
        'hematology_abnormality',
        'hematology_remarks',
        'urinalysis_result',
        'urinalysis_abnormality',
        'urinalysis_remarks',
        'xray_result',
        'xray_abnormality',
        'xray_remarks',
        'ishihara_result',
        'ishihara_abnormality',
        'ishihara_remarks',
        'drugtest_result',
        'drugtest_abnormality',
        'drugtest_remarks',
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
