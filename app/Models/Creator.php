<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creator extends Model
{
        protected $fillable = [
        'name',
        'email',
        'password',
        'vice_ID_card',
        'versa_ID_card',
        'face_selfie',
        'face_card',
    ];
}
