<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMarketingOfNewLead extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $zip;
    public $source;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $lastname, $phone, $email, $zip, $source)
    {
        $this->name = $firstname . ' ' . $lastname;
        $this->phone = $phone;
        $this->email = $email;
        $this->zip = $zip;
        $this->source = $source;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notify-marketing-of-new-lead');
    }
}
