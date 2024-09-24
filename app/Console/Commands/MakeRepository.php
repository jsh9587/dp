<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository class';

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Repositories/{$name}.php");

        if (File::exists($path)) {
            $this->error('Repository already exists!');
            return;
        }

        // Stub 파일에서 내용을 가져와 치환 후 저장
        $stub = File::get(base_path('stubs/repository.stub'));
        $stub = str_replace('{{ class }}', $name, $stub);

        File::ensureDirectoryExists(app_path('Repositories'));
        File::put($path, $stub);

        $this->info('Repository created successfully.');
    }
}
