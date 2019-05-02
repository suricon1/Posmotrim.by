<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::if('admin', function() {
            return is_admin();
        });
    }

    public function register()
    {
        //
    }
}
