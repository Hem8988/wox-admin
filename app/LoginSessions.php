<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSessions extends Model
{
    use HasFactory;

    	
    public $table = 'login_sessions';
	protected $fillable = [
        'ip', 'browser', 'os', 'user_id'
    ];
  
  
}
