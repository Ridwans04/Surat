<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $menu_utamaJson = file_get_contents(resource_path('data/menu-data/menu_user.json'));
        $menu_utamaData = json_decode($menu_utamaJson);
        $menu_pegawaiJson = file_get_contents(resource_path('data/menu-data/menu_pegawai.json'));
        $menu_pegawaiData = json_decode($menu_pegawaiJson);

        // Share all menuData to all the views
        View::share('menu_user', $menu_utamaData);
        View::share('menu_pegawai', $menu_pegawaiData);
    
    }
}
