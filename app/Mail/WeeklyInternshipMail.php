<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class WeeklyInternshipMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $amount;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $amount)
    {
        $this->user = $user;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.weekly-internship')->with('amount', $this->amount)->with('user', $this->user);
    }
}
