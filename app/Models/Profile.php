<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'last_name', 'first_name', 'middle_name', 'extension_name', 'address', 'contact_number', 'civil_status', 'zppsu_number'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function medical_profile() {
        return $this->hasOne(MedicalProfile::class);
    }
}
