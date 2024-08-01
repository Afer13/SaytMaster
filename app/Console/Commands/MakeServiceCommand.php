<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Service Class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service {$name} already exists!");
            return 1;
        }
        $className=basename($name);
        
        $nameArr=explode('/',$name);
        array_pop($nameArr);
        $namespace="";
        if(count($nameArr)){
            $namespace="\\".implode("\\",$nameArr);
        }
        
        
        $stub = "<?php\n\nnamespace App\Services{$namespace};\n\nuse Illuminate\Http\Request;\n\nclass {$className}\n{\n\n}\n";
        File::put($path, $stub);


        $this->info("Service {$name} created successfully.");
        return 0;
    }
}
