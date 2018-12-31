<?php

namespace App\Providers;

use App\Models\Companias;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Reliese\Coders\CodersServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Mantenimiento.colaboradores.credtColaboradoresnoEMB', function ($view) {
            $view->with('companias', Companias::all());
            $view->with('tiposDoc', TipoDocumento::all());
        });
        view()->composer('*', function ($view) {
            $ruta = Route::getFacadeRoot()->current()->uri();
            $menu = Session::get('menu');
            if ($ruta != 'acceso/login') {
                $menuSelect = $menu->where('url_menu', $ruta)->first();
                if ($menuSelect->cod_menu_padre != 0) {
                    do{
                        if($menuSelect->cod_menu_padre!=0){
                            $menuSelect=$menu->where('cod_menu', $menuSelect->cod_menu_padre)->first();
                        }
                    }while($menuSelect->cod_menu_padre!=0);
                    $menuFiltrado = $menu->where('pos_menu', 1)
                        ->where('cod_menu_padre', $menuSelect->cod_menu);
                    $menAdicionales = $menu->whereIn('cod_menu_padre', $menu->where('cod_menu_padre', $menuSelect->cod_menu)->pluck('cod_menu'));

                    $view->with('menuOpciones', $menuFiltrado);
                    $view->with('menuOpcionesHijos', $menAdicionales);
                    $view->with('activo', $menuSelect->cod_menu);
                } else {
                    $menuFiltrado = $menu->where('pos_menu', 1)->where('cod_menu_padre', $menuSelect->cod_menu);
                    $menAdicionales = $menu->whereIn('cod_menu_padre', $menu->where('cod_menu_padre', $menuSelect->cod_menu_padre)->pluck('cod_menu'));

                    $view->with('menuOpciones', $menuFiltrado);
                    $view->with('menuOpcionesHijos', $menAdicionales);
                    $view->with('activo', $menuSelect->cod_menu);
                }
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
        if ($this->app->environment() == 'local') {
            $this->app->register(CodersServiceProvider::class);
        }
    }

}
