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
        // {name}에서 '/' 문자가 포함된 경우, 하위 디렉토리 처리
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        // 스텁 파일의 경로 설정
        $stubPath = base_path('stubs/service.stub');
        if (!File::exists($stubPath)) {
            $this->error('Stub file not found!');
            return;
        }

        // Stub 파일에서 내용을 가져와 치환 후 저장
        $stub = File::get($stubPath);
        $stub = str_replace('{{ class }}', class_basename($name), $stub);

        // 디렉토리 존재 여부 확인 및 생성
        File::ensureDirectoryExists(dirname($path));
        File::put($path, $stub);

        $this->info('Service created successfully.');
    }
}
