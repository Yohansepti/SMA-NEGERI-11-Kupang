<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'role', 'image', 'nuptk', 'gender', 'birth_place', 'birth_date', 'nip', 'ptk_type'];
}
