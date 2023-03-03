<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Queue\ShouldQueue;

class TicketMail extends Mailable
{
	use Queueable, SerializesModels;
	
	public $booking;
	public $subject;
	public $sender;
	public $array;
	/**
	* Create a new message instance.
	*
	* @return void
	*/
	public function __construct($booking) {
		$this->booking = $booking;
		
	}
	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build() {
			$fetchedData = $this->booking;		
		
		return $this->from('infor@travel24.com', 'Travel24 Booking')->subject('Flight ticket booking confirmation')->view('emails.ticket', compact(['fetchedData']));
		 
	}
}
