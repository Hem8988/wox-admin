<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApiDetail extends Authenticatable
{
    use Notifiable;
	use Sortable;

	protected $fillable = [
        'api_details_id', 'api_name', 'api_logo', 'api_username', 'api_password', 'api_url', 'api_credential_type', 'api_status'
    ];
	
	public $sortable = ['api_details_id', 'api_name', 'api_status']; 
} 