<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BookingDetail extends Authenticatable
{
    use Notifiable;
	use Sortable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
	
	protected $fillable = [
    'user_id',
	'depart_flight',
	'source',
	'destination',
	'from_date',
	'depart_date',
	'to_date',
	'return_date',
	'return_flight',
	'booking_response',
	'ticket_status',
	'pnr',
	'status',
    'email',
    'mobile',
    'type',
        'id', 'created_at', 'updated_at','agent_id'
    ];
  
	public $sortable = ['id', 'created_at', 'updated_at'];
 
	public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }
	public function agent()
    {
        return $this->belongsTo('App\Agent','user_id','id');
    }
	public function paymentdetail()
    {
        return $this->belongsTo('App\PaymentDetail','id','bookingid');
    }
}
