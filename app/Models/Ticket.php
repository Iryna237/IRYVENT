<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'description',
        'qrcode',
        'event_id',
        'ticket_type_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function ticket_type()
    {
        return $this->belongsTo(TicketTypes::class, ' ticket_type_id');
    }
}
