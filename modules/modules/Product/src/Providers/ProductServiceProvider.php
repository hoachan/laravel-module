<?php

namespace Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'product');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__. '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__. '/../../routes/routes.php');

        $this->loadViewsFrom(__DIR__. '/../Views', 'product');

        Blade::anonymousComponentPath(__DIR__. '/../Views/components', 'product'); // after that just call --> product::
    }
}
