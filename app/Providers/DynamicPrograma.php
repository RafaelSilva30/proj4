<?php
namespace App\Providers;
use App\Dropdown_programa;
use Illuminate\Support\ServiceProvider;
class DynamicPrograma extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('programa_class',Dropdown_programa::all());
        });
    }
}