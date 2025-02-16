<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\Models\ModuleHistory;
use Illuminate\Console\Command;

class GenerateModuleHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:generate-module-history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modules = Module::all();

        foreach ($modules as $module) {
            if ($module->status) {
                // Generate random data
                ModuleHistory::create([
                    'module_id' => $module->id,
                    'data_type' => 'temperature', // Example data type
                    'data_value' => rand(20, 100), // Random temperature
                ]);
            } else {
                // Randomly recover faulty modules
                if (rand(1, 10) > 8) {
                    $module->update(['status' => 1]); // Recover to "working" state
                }
            }
        }

        $this->info('Historical data generated successfully.');
    }
}
