<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'events';
    protected $fillable=[
        'event_type_id', 
        'user_id', 
        'date', 
        'location', 
        'hour', 
        'nomb_invi', 
        'theme', 
        'competition', 
        'enjeux', 
        'picture', 
        'duration', 
        'ceremony', 
        'type_zik', 
        'module', 
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function eventType()
    {
        return $this->belongsTo(EventTypes::class, 'event_type_id');
    }

    

    public function contributors()
    {
    return $this->hasMany(contributors::class, 'event_id');
    }
    
    

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

   

   
}
