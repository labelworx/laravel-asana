<?php

namespace Torann\LaravelAsana;

use Illuminate\Console\Command;

class AsanaMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:asana {name : Class (singular) for example ToDoAsanaTask}';

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
     */
    public function handle()
    {
        $this->createTaskClassFile($this->argument('name'));
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
     */
    protected function createTaskClassFile($className)
    {
        $this->checkDirectory();

        if (file_exists(app_path('Asana')."/{$className}.php")) {
            $this->error('Asana task class already exists');
            exit;
        }

        $taskTemplate = str_replace(
            ['{{className}}'],
            [$className],
            $this->getStub()
        );

        file_put_contents(app_path("Asana/{$className}.php"), $taskTemplate);
    }

    /**
     * Create the directory for template classes if it does not exist
     */
    protected function checkDirectory()
    {
        if (!file_exists(app_path('Asana'))) {
            if (!mkdir(app_path('Asana'))) {
                $this->error('Could not create ' . app_path('Asana') . ' directory');
                exit;
            }
        }
    }
}
