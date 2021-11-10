<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class reservation_mail_reject extends Mailable
{
    use Queueable, SerializesModels;

    public $company_image;
    public $company_name;
    public $client_name;
    public $time;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_name, $client_name, $time, $date, $company_image)
    {
        $this->company_image = $company_image;
        $this->company_name = $company_name;
        $this->client_name = $client_name;
        $this->time = $time;
        $this->date = $date;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.reservation_mail_reject');
    }
}
