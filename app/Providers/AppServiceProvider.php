<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use  Illuminate\Support\Facades\DB;

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
        if (Schema::hasTable('projects')) {
            $projects = DB::table('projects')->get();
            View::share([
                'projects' => $projects
            ]);
        } else {
            $projects = [];
            View::share([
                'projects' => $projects
            ]);
        }
    }
}
