<?php

namespace App\Console\Commands;

use App\Models\Module;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ChangeRandomModuleStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:change-random-module-status';

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
        // Get all modules that are not already faulty
        $module = Module::where('status', '!=', 'faulty')->inRandomOrder()->first();

        if ($module) {
            $module->update(['status' => 'faulty']);
            Log::info('This is an informational message.');

            $this->info("Module '{$module->name}' status changed to 'faulty'.");
        } else {
            $this->info('No modules available to set as faulty.');
        }

        return 0;
    }
}
