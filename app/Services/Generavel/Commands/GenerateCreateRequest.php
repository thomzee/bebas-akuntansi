<?php


namespace App\Services\Generavel\Commands;


use Illuminate\Console\GeneratorCommand;

class GenerateCreateRequest extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generavel:create-request {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Laravel create request.';

    /**
     * @var string
     */
    protected $type = 'GeneravelCreateRequest';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Services/Generavel/Commands/Stubs/create_request.stub';
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Requests';
    }
}
