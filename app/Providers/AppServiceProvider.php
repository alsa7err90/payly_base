<?php

namespace App\Providers;

use App\Models\ConfigInDb;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('config_in_dbs')) {
            foreach (ConfigInDb::all() as $setting) {
                Config::set('configInDb.'.$setting->key, $setting->value);
            }
        }
    }
}
