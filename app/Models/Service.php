<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean',
        'duration_minutes' => 'integer'
    ];

    // Relationship with appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}