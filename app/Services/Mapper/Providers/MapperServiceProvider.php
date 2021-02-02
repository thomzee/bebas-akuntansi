<?php


namespace App\Services\Mapper\Providers;


use App\Services\Mapper\MapperService;
use Illuminate\Support\ServiceProvider;

class MapperServiceProvider extends ServiceProvider
{
    protected $commands = [
        'App\Services\Mapper\Commands\GenerateMapper',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
        $this->registerService();
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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'mapper'
        ];
    }

    /**
     * Register service class.
     */
    protected function registerService()
    {
        $this->app->singleton('mapper', function () {
            return new MapperService();
        });
        $this->app->alias('mapper', MapperService::class);
    }
}
