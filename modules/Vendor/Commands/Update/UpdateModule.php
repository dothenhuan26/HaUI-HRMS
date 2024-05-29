<?php

namespace Modules\Vendor\Commands\Update;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Core\Updates\Update;

class UpdateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Update::run();
        $this->info("Module Updated Successfully!");

    }
}
