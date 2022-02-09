<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationFollowUps extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public $maildata; 
    public function __construct($mail_data)
    {
        $this->maildata=$mail_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$syb='Followup - '.$this->maildata['STUDENT']->firstName.' lessons with'.$this->maildata['t_firstname'];
        return $this->from('synpase979@gmail.com')
					->subject("$syb")
					->view('emails.first_lesson_email')->with([
					't_firstname'=>$this->maildata['t_firstname'],
					't_lastname'=>$this->maildata['t_lastname'],
					'STUDENT' => $this->maildata['STUDENT'],
					'insName'=>$this->maildata['insName'],
					'key'=> $this->maildata['key'],
					'RATES'=>$this->maildata['RATES'],
					'PHONE'=>$this->maildata['RATES']
					]);
    }
}
