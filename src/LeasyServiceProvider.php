<?php

namespace Leasy\Leasy;

use Illuminate\Support\Facades\Blade;
use Leasy\Leasy\Livewire\ToastrHandler;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LeasyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('leasy')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->publishesServiceProvider('LeasyServiceProvider')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->startWith(function (InstallCommand $command) {
                    $command->info('Welcome to the Leasy installation process');
                })->publishConfigFile()
                    ->publishAssets()
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Leasy has been installed successfully !');
                        $command->info('Thanks for using Leasy');
                    });
            });
    }

    public function bootingPackage(): void
    {
        // REGISTER COMPONENTS
        $this->registerComponents();
        $this->registerLivewireComponents();
        // REGISTER DIRECTIVE
        $this->registerBladeDirectives();
        // SET PROVIDER
        app('leasy')->setProvider($this);
    }

    private function registerComponents(): void
    {
        Blade::componentNamespace("Leasy\\Views\\Components\\", 'leasy');
    }

    private function registerBladeDirectives(): void
    {
        Blade::directive('leasyScripts', function ($expression) {
            return '<script src="'.asset('vendor/leasy/js/leasy.min.js').'"></script><livewire:toastr />';
        });
        Blade::directive('leasyStyles', function ($expression) {
            return '<link rel="stylesheet" href="'.asset('vendor/leasy/css/leasy.min.css').'"><script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>';
        });
    }

    private function registerLivewireComponents(): void
    {
        Livewire::component('toastr', ToastrHandler::class);
    }
}
