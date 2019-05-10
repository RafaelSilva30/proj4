<?php
namespace App\Providers;
use App\Dropdown_concelho;
use Illuminate\Support\ServiceProvider;
class DynamicConcelho extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('concelho_class',Dropdown_concelho::all());
        });
    }
}