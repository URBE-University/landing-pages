<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactToDBFailed extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $name, $phone, $lead_source, $program_of_interest, $zip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $phone, $lead_source, $program_of_interest, $zip)
    {
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
        $this->lead_source = $lead_source;
        $this->program_of_interest = $program_of_interest;
        $this->zip = $zip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Alert! - Failed to sync contact with Database')->markdown('emails.contact-to-db-fails');
    }
}
