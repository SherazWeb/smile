<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $casts = [
        'gallery_folder' => 'array',
        'tags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }
}
