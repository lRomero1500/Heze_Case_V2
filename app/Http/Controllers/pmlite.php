<?php

namespace App\Http\Controllers;

use App\Models\PmLog;
use App\Models\PmProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pmlite extends Controller
{
    //region Vistas
    public function index()
    {
        $title_page = 'Project Manager Lite';
        return view('PMlite.index', compact('title_page'));
    }
    public function proyectoVer()
    {
        $title_page = 'PML proyectos ver todo';
        return view('PMlite.Proyectos.verTodo', compact('title_page'));
    }
    public function proyectoCrear()
    {
        $title_page = 'PML proyectos crear';
        return view('PMlite.Proyectos.crear', compact('title_page'));
    }
    public function tareaVer()
    {
        $title_page = 'PML tareas ver todas';
        return view('PMlite.Tareas.verTodo', compact('title_page'));
    }
    public function tareaCrear()
    {
        $title_page = 'PML tareas crear';
        return view('PMlite.Tareas.crear', compact('title_page'));
    }
    //endregion
    //region Crear Editar
    public function creaEditProyecto(Request $request){
        $usr=Auth::user()->id_Usuarios;
        $hist=new PmLog();
        $proyecto = new PmProyecto();
        $proyecto->fill($request->all());
        try {
            if ($proyecto->id == '0') {
                $proyecto->activo=true;
                $proyecto->estado_proyecto_id=1;
                $proyecto->cant_horas_total_asig=0;
                $proyecto->cant_horas_total_consum=0;
                $proyecto->hez_usuario=$usr;
                $proyecto->save();
                $hist->desc_logs="Creacion del Proyecto: ".$proyecto->nombre_proyecto;
                $hist->usuario_id=$usr;
                $hist->operaciones_log_id=1;
                $hist->save();
                /*if (preg_match('/^data:image\/(\w+);base64,/', $request->get('base64FotPerf'), $type)) {
                    $companias->logo_companias = $img_url;
                    $this->cargaImagenes($request->get('base64FotPerf'), 1, $img_url);
                } else {
                    $companias->logo_companias = $request->get('base64FotPerf');
                }
                $companias->save();
                $dat = HezCompania::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);*/
            } else {
                /*$CompaniasUp = HezCompania::find($companias->cod_Companias);
                $CompaniasUp->nomb_Companias = $companias->nomb_Companias;
                $CompaniasUp->nit_Companias = $companias->nit_Companias;
                $CompaniasUp->tel_Companias = $companias->tel_Companias;
                $CompaniasUp->direccion_companias = $companias->direccion_companias;
                if (preg_match('/^data:image\/(\w+);base64,/', $request->get('base64FotPerf'), $type)) {
                    $companias->logo_companias = $img_url;
                    if (!empty($CompaniasUp->logo_companias)) {
                        $this->eliminaImagenes($CompaniasUp->logo_companias, 1);
                    }
                    $this->cargaImagenes($request->get('base64FotPerf'), 1, $img_url);
                    $CompaniasUp->logo_companias = $companias->logo_companias;
                }
                $CompaniasUp->correo_companias = $companias->correo_companias;
                $CompaniasUp->save();
                $dat = HezCompania::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se modifico  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);*/
            }

        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Error: ' . $e,
                'error' => true
            ]);
        }
    }
    //endregion
}
