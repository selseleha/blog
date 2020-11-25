<?php

namespace App\Providers;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

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
        $array = explode('.', Request::server('HTTP_HOST'));
        $subdomain=array_shift($array);

        switch ($subdomain) {
            case "sample1":
                DB::disconnect();
                Config::set('database.default', 'mysql1');
                DB::reconnect();
                break;
            case "sample2":
                DB::disconnect();
                Config::set('database.default', 'mysql2');
                DB::reconnect();
                break;


        }


    }
}
