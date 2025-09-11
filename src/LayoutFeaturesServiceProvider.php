<?php

namespace Inmanturbo\LayoutFeatures;

use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;

class LayoutFeaturesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/layout.php', 'layout');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/layout.php' => config_path('layout.php'),
        ], 'layout-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views'),
        ], 'layout-views');

        if (! config('layout.active')) {
            return;
        }

        Feature::define('layout', function (mixed $scope) {
            return config('layout.default')->name;
        });
    }
}
