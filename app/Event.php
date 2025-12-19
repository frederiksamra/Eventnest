<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    
    protected $fillable = [
        'event_name',
        'organizer',
        'category',
        'location',
        'event_date',
        'start_time',
        'end_time',
        'ticket_price',
        'capacity',
        'description',
        'status',
        'image'
    ];
}