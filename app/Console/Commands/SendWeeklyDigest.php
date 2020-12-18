<?php

namespace App\Console\Commands;

use App\Mail\WeeklyDigest;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWeeklyDigest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weeklydigest:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all articles created in the last 7 days to all users subscribed to the digest.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where(['is_subscribed_to_digest' => true])->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new WeeklyDigest);
        }

        return 0;
    }
}
