<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::if('isadmin',function (){
            if(Auth::check()){
                return Auth::user()->is_admin==1 ?true :false;
            }
            else {
                return false;
            }
        });

        Blade::if('isstudent',function (){
            if(Auth::check()){
                return Auth::user()->is_admin==0 ?true :false;
            }
            else {
                return false;
            }



        });
    }
    

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
