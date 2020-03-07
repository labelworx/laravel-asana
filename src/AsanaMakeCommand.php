<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AsanaMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:asana {className : Class (singular) for example ToDoAsanaTask}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new asana task template class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return bool|void|null
     * @throws Exception
     */
    public function handle()
    {
        $this->createTaskClassFile($this->argument('className'));
    }

    /**
     * Get AsanaTask stub
     *
     * @return false|string
     */
    protected function getStub()
    {
        return file_get_contents(__DIR__ . '/../stubs/AsanaTask.stub');
    }

    /**
     * Create the Asana Task Template Class file
     *
     * @param $className
     * @throws Exception
     */
    protected function createTaskClassFile($className)
    {
        if (file_exists("Asana/{$className}.php")) {
            throw new Exception('Asana task class already exists');
        }

        $taskTemplate = str_replace(
            ['{{className}}'],
            [$className],
            $this->getStub()
        );

        file_put_contents(app_path("Asana/{$className}.php"), $taskTemplate);
    }
}
