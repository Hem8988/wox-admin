<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TravelPlan extends Authenticatable
{
    use Notifiable;

	protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
    ];
}