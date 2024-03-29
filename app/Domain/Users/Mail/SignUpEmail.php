<?php

namespace App\Domain\Users\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignUpEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $data;

    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = "", $message = "")
    {
        $this->data = $data;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('utils.mail.sign-up');
    }
}
