<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Visa extends Authenticatable
{
    use Notifiable;
	use Sortable;

	protected $fillable = [
        'id', 'first_name', 'last_name', 'email_id', 'phone_no', 'departure_date', 'return_date', 'passport_no', 'residence_country', 'destination_country', 'message', 'status', 'status_comment', 'created'
    ];
	
	public $sortable = ['id', 'first_name', 'status']; 
} 