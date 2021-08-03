<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail)
    {
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $mail = $mail->cc();

        $detail = $this->detail;
        $mail = $this->subject($detail['subject']);

        $name = $detail['name'];
        $url = $detail['url'];

        $mail   = $mail->view('admin.email.reset-password', compact('name','url'));

        return $mail;   
    }
}
