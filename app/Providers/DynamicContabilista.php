<?php
namespace App\Providers;
use App\Dropdown_contabilista;
use Illuminate\Support\ServiceProvider;
class DynamicContabilista extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('contabilista_class',Dropdown_contabilista::all());
        });
    }
}