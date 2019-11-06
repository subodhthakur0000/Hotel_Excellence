<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Quick extends Mailable
{
    
    use Queueable, SerializesModels;
    public $merge;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($merge)
    {
        $this->merge=$merge;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('cd-admin.dashboard.quick');
    }
}
