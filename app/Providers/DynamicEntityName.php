<?php
namespace App\Providers;
use App\Dropdown_entidades;
use Illuminate\Support\ServiceProvider;
class DynamicEntityName extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('entidade_class',Dropdown_entidades::all());
        });
    }
}