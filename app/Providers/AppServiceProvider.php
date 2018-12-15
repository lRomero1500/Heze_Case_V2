<?php

namespace App\Providers;

use App\Models\Companias;
use App\Models\TipoDocumento;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('colaboradores.credtColaboradoresEMB',function ($view){
            $view->with('companias',Companias::all());
            $view->with('tiposDoc',TipoDocumento::all());
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
