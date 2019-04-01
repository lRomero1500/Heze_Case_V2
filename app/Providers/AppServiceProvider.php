<?php

namespace App\Providers;

use App\Models\Companias;
use App\Models\HezClientesemp;
use App\Models\HezCompania;
use App\Models\HezTipocost;
use App\Models\HezTipoDocumento;
use App\Models\PmImportanciaProyecto;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Auth;
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
        view()->composer(['Mantenimiento.colaboradores.credtColaboradoresnoEMB', 'Mantenimiento.departamentos.credtDepartamentosEMB', 'Mantenimiento.servicios.credtServiciosEMB', 'Mantenimiento.clientes.credtclientesnoEMB'], function ($view) {
            $view->with('companias', HezCompania::all());
            $view->with('tiposDoc', HezTipoDocumento::all());
            $view->with('tipCost', HezTipocost::all());
        });
        view()->composer(['PMlite.Proyectos.crear'], function ($view) {
            $user = Auth::user();
            if ($user->cod_Rol === 1) {
                $view->with('clientes', HezClientesemp::with(['hez_compania', 'hez_compania_cliente'])->get());
            }else {
                $view->with('clientes', HezClientesemp::with(['hez_compania', 'hez_compania_cliente'])->where('compania_id', '=', $user->hez_empleado->cod_Companias)->get());
            }
            $view->with('nivelimport', PmImportanciaProyecto::all());
        });
        view()->composer('*', function ($view) {
            $ruta = Route::getFacadeRoot()->current()->uri();
            $menu = Session::get('menu');
            if ($ruta !== 'acceso/login' && $ruta !== 'Usuario/misdatos') {
                $menuPadreReal = null;
                $menuSelect = $menu->where('url_menu', $ruta)->first();
                if ($menuSelect->cod_menu_padre !== 0) {
                    $menPadAnt = $menuSelect->cod_menu_padre;
                    do {
                        $menuPadreReal = $menu->where('cod_menu', $menPadAnt)->first();
                        $menPadAnt = $menuPadreReal->cod_menu_padre;
                    } while ($menuPadreReal->cod_menu_padre !== 0);
                    $menuFiltrado = $menu->where('pos_menu', 1)
                        ->where('cod_menu_padre', $menuPadreReal->cod_menu);
                    $menAdicionales = $menu->whereIn('cod_menu_padre', $menu->where('cod_menu_padre', $menuPadreReal->cod_menu)->pluck('cod_menu'));

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
