<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Actualite;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActualiteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $template_data;

    public function __construct($template_data)
    {
       $this->template_data = $template_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->view('mail.actualiteMail') ; 
    }
}