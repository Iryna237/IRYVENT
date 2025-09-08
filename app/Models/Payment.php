<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'event_id',
        'amount',
        'description',
        'currency',
        'reference',
        'status',
        'channel',
        'phone',
     
    ];
}
