<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'program_id',
        'name',
        'abbreviation',
        'duration_years',
        'is_active',
        'food_related'
    ];

    public function program() {
        return $this->belongsTo(Program::class);
    }
}
