<?php

namespace spkm\ClearPass;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ClearPassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('ClearPass')
        ->hasConfigFile('clearpass')
        ->hasInstallCommand(function(InstallCommand $command) {
            $command->publishConfigFile();
        });

        $this->app->singleton('clearpass', function ($app) {
            return new ClearPassService;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/clearpass.php' => config_path('clearpass.php'),
        ], 'clear-pass'); // Custom tag here
    }

    public function provides()
    {
        return ['clearpass'];
    }
}
