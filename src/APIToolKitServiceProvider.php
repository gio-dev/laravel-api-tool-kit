<?php

namespace Essa\APIToolKit;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Essa\APIToolKit\Commands\MakeEnumCommand;
use Essa\APIToolKit\Commands\GeneratorCommand;
use Essa\APIToolKit\Commands\MakeActionCommand;
use Essa\APIToolKit\Commands\MakeFilterCommand;
use Essa\APIToolKit\Commands\GeneratePermissions;

class APIToolKitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositoryProviders();
        $this->registerResourceCustom();
    }

    public function boot()
    {
        $this->AddConfigFiles();

        $this->registerCommands();
    }

    public function AddConfigFiles(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/api-tool-kit.php', 'api-tool-kit');

        if ($this->app->runningInConsole() && function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/../config/api-tool-kit.php' => config_path('api-tool-kit.php'),
            ], 'config');
        }
    }

    public function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GeneratorCommand::class,
                MakeActionCommand::class,
                MakeEnumCommand::class,
                GeneratePermissions::class,
                MakeFilterCommand::class
            ]);
        }
    }

    public function registerResourceCustom(): void
    {
        if ($this->app->runningInConsole()) {
            if (! file_exists(app_path("/Core/Resources"))) {
//                $this->filesystem->makeDirectory(app_path("/Core/Resources"));
                File::makeDirectory(app_path("/Core/Resources"), 0775, true, true);
            }
            
            $this->publishes([
                __DIR__ . '\Stubs\AppJsonResource.stubs' => app_path('Core/Resources/AppJsonResource.php'),
            ], 'app-json-reso');
            $this->publishes([
                __DIR__ . '/Stubs/AppAnonymousResourceCollection.stubs' => app_path('Core/Resources/AppAnonymousResourceCollection.php'),
            ], 'app-anony-json-reso');
        }
    }

    public function registerRepositoryProviders(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/stubs/RepositoryServiceProvider.stub' => app_path('Providers/RepositoryServiceProvider.php'),
            ], 'repositoryservice-provider');
        }
    }
}
