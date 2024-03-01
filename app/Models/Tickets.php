<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'name',
        'email',
        'events', // Add this line to allow mass assignment for the 'events' field
        'total_price',
        'tickets',
    ];
}
