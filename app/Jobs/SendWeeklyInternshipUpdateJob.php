<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Mail\WeeklyInternshipMail;
use Illuminate\Support\Facades\Mail;

class SendWeeklyInternshipUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $amount;

    /**
     * Create a new job instance.
     */
    public function __construct($amount, User $user)
    {
        $this->user = $user;
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->user)->send(new WeeklyInternshipMail($this->user, $this->amount));
    }
}
