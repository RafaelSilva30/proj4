<?php
namespace App\Providers;
use App\Dropdown_entidades;
use Illuminate\Support\ServiceProvider;
class DynamicEntityName extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('nome_entidades',Dropdown_entidades::all());
        });
    }
}