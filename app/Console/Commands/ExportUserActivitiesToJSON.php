<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportUserActivitiesToJSON extends Command
{
    protected $signature = 'export:user-activities-json';

    protected $description = 'Export user activities to JSON';

    public function handle()
    {
        $activities = DB::table('user_activities')->get();
        $json = json_encode($activities);
        file_put_contents('user_activities.json', $json);
        // Provide feedback
        $this->info('Activities data has been exported successfully ');
    }
}
