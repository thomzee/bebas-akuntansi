<?php


namespace App\Services\Generavel\Providers;


use Illuminate\Support\ServiceProvider;

class GeneravelServiceProvider extends ServiceProvider
{
    protected $commands = [
        'App\Services\Generavel\Commands\GenerateModel',
        'App\Services\Generavel\Commands\GenerateController',
        'App\Services\Generavel\Commands\GenerateMapper',
        'App\Services\Generavel\Commands\GenerateCreateRequest',
        'App\Services\Generavel\Commands\GenerateUpdateRequest',
        'App\Services\Generavel\Commands\GenerateAll',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
