<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Cars extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable =
        [
            'name',
            'company',
            'model',
            'color',
            'year',
            'status',
            'url_picture',
            'user_id'
        ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');

    }

    public function cars()
    {
        return $this->hasMany(Cars::class , 'user_id');
    }
}

