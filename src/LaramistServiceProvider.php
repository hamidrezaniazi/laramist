<?php

namespace Hamidrezaniazi\Laramist;

use Illuminate\Support\ServiceProvider;

class LaramistServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if (! class_exists('CreateModelHistoriesTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_model_histories_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_model_histories_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
