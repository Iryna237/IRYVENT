<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','event_type',
        'start_date','end_date','location',
        'headline_artist','sport_type','speaker','banner'
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
