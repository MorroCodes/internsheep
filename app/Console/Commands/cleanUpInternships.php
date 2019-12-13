<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;

class cleanUpInternships extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'internships:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes old intership records from database';

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
        $date = new DateTime();
        $date->modify('-3 months');
        $formatted = $date->format('Y-m-d H:i:s');
        $this->info('Removing records older than '.$formatted);
        $count = \App\Internship::where('updated_at', '<=', $formatted)->delete();
        $this->line($count.' old records removed!');
    }
}
