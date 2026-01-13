<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $fillable = [
        'academic_year',
        'requirements',
        'schedule',
        'brochure',
        'guide',
        'is_active'
    ];

    protected $casts = [
        'schedule' => 'array',
        'is_active' => 'boolean'
    ];
}
