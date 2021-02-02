<?php


namespace App\Services\Generavel\Commands;


use Illuminate\Console\GeneratorCommand;

class GenerateUpdateRequest extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generavel:update-request {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Laravel update request.';

    /**
     * @var string
     */
    protected $type = 'GeneravelUpdateRequest';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Services/Generavel/Commands/Stubs/update_request.stub';
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
