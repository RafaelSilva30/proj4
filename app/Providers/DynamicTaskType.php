<?php
namespace App\Providers;
use App\Dropdown_tipos;
use Illuminate\Support\ServiceProvider;
class DynamicTaskType extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('tipo_class',Dropdown_tipos::all());
        });
    }
}