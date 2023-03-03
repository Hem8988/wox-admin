<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheapFlight extends Model
{
    protected $table='cheap_flights';

    protected $fillable=[
        'depature',
        'arrival',
        'depature_date',
        'arrival_date',
        'booking_price',
        'price',
        'image',
        'details'
    ];
}
