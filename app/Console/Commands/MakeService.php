<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        // Stub 파일에서 내용을 가져와 치환 후 저장
        $stub = File::get(base_path('stubs/service.stub'));
        $stub = str_replace('{{ class }}', $name, $stub);

        File::ensureDirectoryExists(app_path('Services'));
        File::put($path, $stub);

        $this->info('Service created successfully.');
    }
}
