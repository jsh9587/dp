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
        // {name}에서 '/' 문자가 포함된 경우, 하위 디렉토리 처리
        $name = $this->argument('name');
        $className = class_basename($name); // 클래스 이름 추출
        $path = app_path("Repositories/{$name}.php"); // 경로 설정

        if (File::exists($path)) {
            $this->error('Repository already exists!');
            return;
        }

        // 스텁 파일의 경로 설정
        $stubPath = base_path('stubs/repository.stub');
        if (!File::exists($stubPath)) {
            $this->error('Stub file not found!');
            return;
        }

        // Stub 파일에서 내용을 가져와 치환 후 저장
        $stub = File::get($stubPath);
        $stub = str_replace('{{ class }}', $className, $stub); // 클래스 이름 치환

        // 디렉토리 존재 여부 확인 및 생성
        $directoryPath = dirname($path);
        File::ensureDirectoryExists($directoryPath); // 디렉토리 생성
        File::put($path, $stub); // 파일 저장

        $this->info('Repository created successfully at ' . $path);
    }
}
