<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateEvent extends Model
{
    protected $fillable = [
        'eventname',
        'eventcapacity',
        'eventlocation',
        'eventdate',
        'event_openingtime',
        'event_closingtime',
        'alias',
        'single_ticket_price',
        'partners_tickets_price',
        'group_tickets_price',
    ];

    // Rest of your model code...
}
