<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAllowBookingAttribute()
    {
        $setting = \App\Models\SystemSetting::first();
        return $setting ? $setting->allow_booking : false;
    }

    public function hasProfile() {
        return $this->name != null;
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    
    public function medical_results() {
        return $this->hasMany(MedicalResults::class, 'user_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function student_information()
    {
        return $this->hasOne(StudentInformation::class);
    }
}
