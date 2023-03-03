<?php

namespace App\Mail;

use App\Package;
use App\PackageBookingDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HolidayBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $booking;
    public $package;
    public function __construct(PackageBookingDetail $booking,Package $package)
    {
        $this->booking = $booking;
        $this->package = $package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.holiday_booking_request')
        ->subject('Holiday ha been book successfully')  //<= how to pass variable on this subject
        ->with([
            'name' => $this->package->name,
            'type'     => $this->package->type,
            
        ]);
    }
}
