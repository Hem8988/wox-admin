<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    

    protected $table ='flight_booking';

    protected $fillable =[
        'user_id',
        'status',
        'payment_details',
        'flight_details'
    ];

    protected $casts = [
        'payment_details' => 'array',
        'flight_details'=>'array'
    ];
}
