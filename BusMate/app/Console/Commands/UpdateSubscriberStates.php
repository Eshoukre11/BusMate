<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Semester;
use App\Models\subscriber;
use Illuminate\Console\Command;

class UpdateSubscriberStates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-subscriber-states';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update subscriber status based on semester end date';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //get all lasted semester 
        $semesters = Semester::where('end_date', '<', Carbon::now())->get();
        //check the semester of subscriber
        foreach ($semesters as $semester) {
            $subscribers = subscriber::where('semester_id', $semester->id)->get();

            foreach ($subscribers as $subscriber) {
                if ($subscriber->status == "active") {
                    $subscriber->update(['subscriber_state' => 'inactive']);
                }
            }
        }
    }
}
