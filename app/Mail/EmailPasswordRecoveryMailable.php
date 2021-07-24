<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailPasswordRecoveryMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pEmailData)
    {
        $this->emailData = $pEmailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.password-recovery');
    }
}
