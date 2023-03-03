<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gallery extends Authenticatable
{
    use Notifiable;
	use Sortable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
		
	protected $fillable = [
        'id', 'gallery', 'gallery_name', 'status', 'created_at', 'updated_at'
    ];
  
	public $sortable = ['id', 'created_at', 'updated_at'];
 
	public function user()
    {
        return $this->belongsTo('App\Admin','user_id','id');
    }
}
