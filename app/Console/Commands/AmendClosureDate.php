<?php

namespace App\Console\Commands;

use App\Models\Incident;
use Illuminate\Console\Command;

class AmendClosureDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'incident:closure';

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
        $incidents = Incident::all();
        foreach ($incidents as $incident) {
            $date = $incident->updated_at;
            $incident->closed_on = $date;
            $incident->save();
        }
        return 0;
    }
}
