<?php


namespace App\Services\Mapper\Commands;


use Illuminate\Console\GeneratorCommand;

class GenerateMapper extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:mapper {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mapper class.';

    /**
     * @var string
     */
    protected $type = 'Mapper';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Services/Mapper/Commands/Stubs/mapper.stub';
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Mappers';
    }

    /**
     * @param string $stub
     * @param string $name
     * @return mixed|string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('DummyMapper', $this->argument('name'), $stub);
    }
}
