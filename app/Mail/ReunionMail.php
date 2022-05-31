<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReunionMail extends Mailable
{
    use Queueable, SerializesModels;


    public $name;
    public $email;
    public $evenement;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user, $evenement)
    {
        $this->name = $user->name;
        $this->evenement = $evenement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reunions.confirm-reunion');
    }
}
