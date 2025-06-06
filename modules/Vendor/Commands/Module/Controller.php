<?php

namespace Modules\Vendor\Commands\Module;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Controller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-controller {name} {--module=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller Module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $name = $this->argument("name");
        $module = $this->argument("module");

        if (!File::exists(base_path("modules/{$module}"))) {
            return $this->error("Module not exists!");
        }

        $controllersFolder = base_path("modules/{$module}/Controllers");
        if (File::exists($controllersFolder)) {
            $controllerFile = base_path("modules/Vendor/Commands/Templates/Controller.txt");
            $controllerContent = File::get($controllerFile);
            $controllerContent = str_replace("{module}", $module, $controllerContent);
            $controllerContent = str_replace("{name}", $name, $controllerContent);
            if (!File::exists($controllersFolder . '/' . $name . '.php')) {
                File::put($controllersFolder . '/' . $name . '.php', $controllerContent);
                return $this->info("Controller Created Successfully!");
            } else {
                return $this->info("Controller already exists!");
            }
        }
        return $this->error("Base Folder Module not exists!");
    }
}
