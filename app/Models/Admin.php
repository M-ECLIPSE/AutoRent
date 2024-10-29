<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'family',
            'national_code',
            'phone',
            'email',
            'birth_date',
            'url_picture'
        ];
}
