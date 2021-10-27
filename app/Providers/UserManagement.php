<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserManagement extends ServiceProvider
{
   

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
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserManagement::class);
    }
}
