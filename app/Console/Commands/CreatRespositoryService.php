<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class CreatRespositoryService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:creat-respository-service';

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
        $name = $this->argument('name');

        $repositoryPath = app_path("Repositories/{$name}Repository.php");
        $servicePath = app_path("Services/{$name}Service.php");

        if (!File::exists($repositoryPath)) {
            File::ensureDirectoryExists(app_path("Repositories"));
            File::put($repositoryPath, $this->getRepositoryStub($name));
            $this->info("Repository created at {$repositoryPath}");
        } else {
            $this->error("Repository already exists");
        }

        if (!File::exists($servicePath)) {
            File::ensureDirectoryExists(app_path("Services"));
            File::put($servicePath, $this->getServiceStub($name));
            $this->info("Service created at {$servicePath}");
        } else {
            $this->error("Service already exists");
        }

        return Command::SUCCESS;
    }

    protected function getRepositoryStub($name)
    {
        return "<?php
namespace App\Repositories;

class {$name}Repository
{
    //
}
";
    }

    protected function getServiceStub($name)
    {
        return "<?php
namespace App\Services;
class {$name}Service
{
//
}
";
    }
}