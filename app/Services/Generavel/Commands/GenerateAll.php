<?php


namespace App\Services\Generavel\Commands;


use Illuminate\Console\Command;

class GenerateAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generavel:all {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Laravel model.';

    /**
     * @var string
     */
    protected $type = 'GeneravelModel';

    public function handle()
    {
        $this->callSilent('generavel:model', ['name' => $this->argument('name')]);
        $this->callSilent('generavel:controller', ['name' => $this->argument('name') . 'Controller']);
        $this->callSilent('generavel:mapper', ['name' => $this->argument('name') . 'Mapper']);
        $this->callSilent('generavel:create-request', ['name' => $this->argument('name') . '/CreateRequest']);
        $this->callSilent('generavel:update-request', ['name' => $this->argument('name') . '/UpdateRequest']);
        $this->output->writeln('Success generating CRUD');
    }
}
