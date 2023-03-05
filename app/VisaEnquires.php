<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaEnquires extends Model
{
    use HasFactory;

    protected $table = 'visa_enquries';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no',
        'email_id',
        'nationality',
        'visa_type',
        'message',
        'passport',
    ];

}
