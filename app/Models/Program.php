<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'college_id',
        'name',
        'abbreviation',
        'description',
        'is_active'
    ];

    public function college() {
        return $this->belongsTo(College::class);
    }

    public function majors() {
        return $this->hasMany(Major::class);
    }
}
