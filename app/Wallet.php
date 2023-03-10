<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Wallet extends Authenticatable
{
    use Notifiable;
	use Sortable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array  
     */
	
	
	protected $fillable = [
        'id', 'created_at', 'updated_at'
    ];
   
	public $sortable = ['id', 'created_at', 'updated_at'];


	public function user()
    {
        return $this->belongsTo('App\Agent','user_id','id');
    }
}
