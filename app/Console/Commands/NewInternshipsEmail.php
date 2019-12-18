<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendWeeklyInternshipUpdateJob;
use DateTime;

class NewInternshipsEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:internships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A little insight on new internships the past week.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $amount = \App\Internship::orderBy('id', 'desc')->where('created_at', '>=', \Carbon\Carbon::today()->subWeek().' 00:00:00')->count();

        $date = new DateTime();
        $date->modify('-7 days');
        $formatted = $date->format('Y-m-d H:i:s');

        $users = \App\User::where('type', 'student')->get();
        foreach ($users as $u) {
            $lastCampaign = \App\Campaign::where([['user_id', $u->id], ['created_at', '>=', $formatted]])->latest()->first();
            if ($lastCampaign == null) {
                dispatch(new SendWeeklyInternshipUpdateJob($amount, $u));
                $log = new \App\Campaign();
                $log->user_id = $u->id;
                $log->save();
            }
        }
    }
}
