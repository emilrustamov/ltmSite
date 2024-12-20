<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ANMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function build()

    { 
        return $this
        ->subject('Заявка')->view('mailTemplate'
        // , ['email' => $this->data['email'], 'name' => $this->data['name']]
    );

    }

}

    /**

     * Build the message.

     *

     * @return $this

     */

  
 

