<?php
namespace App\Providers;
use App\Dropdown_distrito;
use Illuminate\Support\ServiceProvider;
class DynamicDistrito extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('distrito_class',Dropdown_distrito::all());
        });
    }
}