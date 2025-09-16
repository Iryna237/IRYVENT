<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
      protected $fillable = [
        'name',
        'email',
        'password',
        'vice_ID_card',
        'versa_ID_card',
        'face_selfie',
        'face_card',
        'status',
    ];
}
