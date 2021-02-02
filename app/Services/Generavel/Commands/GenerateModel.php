<?php


namespace App\Services\Generavel\Commands;


use Illuminate\Console\GeneratorCommand;

class GenerateModel extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generavel:model {name}';

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

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Services/Generavel/Commands/Stubs/model.stub';
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models';
    }

    /**
     * @param string $stub
     * @param string $name
     * @return mixed|string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('DummyModel', $this->argument('name'), $stub);
    }
}
