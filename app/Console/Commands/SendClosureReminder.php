<?php

namespace App\Console\Commands;

use App\Mail\SendClosureReminder as MailSendClosureReminder;
use App\Models\Incident;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendClosureReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'incidents:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $incidents = Incident::where('finalized', 0)->whereNotNull('assigned_to_email')->get();
        foreach ($incidents as $incident) {
            $days = Carbon::parse($incident->date)->diffInDays(Carbon::today());
            dump($days);
            if ($days > 7) {
                $user = User::where('email', $incident->assigned_to_email)->first();
                Mail::to($incident->assigned_to_email)->cc('osh@afske.aero')->send(new MailSendClosureReminder($incident, $user));
            }
        }
        return 0;
    }
}
