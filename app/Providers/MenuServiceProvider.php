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
        
        // Map user levels to their corresponding menu JSON files
        $menuMapping = [
            'Admin' => 'menu_admin.json',
            'Pemohon' => 'menu_pemohon.json',
            'Policy Maker' => 'menu_pm.json',
            'Staff' => 'menu_sdm.json',
        ];
        
        // Compose all views with shared data
        view()->composer('*', function ($view) {
            if(empty(Auth::user()->level)){
                $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/menu_admin.json'));
            }
            elseif(Auth::user()->level == 'Super Admin'){
                $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/menu_superAdmin.json'));
            }
            elseif(Auth::user()->level == 'Admin'){
                $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/menu_admin.json'));
            }
            elseif(Auth::user()->level == 'Pemohon'){
                $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/menu_pemohon.json'));
            }
            elseif(Auth::user()->level == 'Policy Maker'){
                $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/menu_pm.json'));
            }elseif(Auth::user()->level == 'Staff'){
                $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/menu_sdm.json'));
            }
        
            $verticalMenuData = json_decode($verticalMenuJson);
            $horizontalMenuJson = file_get_contents(base_path('resources/data/menu-data/horizontalMenu.json'));
            $horizontalMenuData = json_decode($horizontalMenuJson);

            // Share all menuData to all the views
            View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
        });
    }
}
