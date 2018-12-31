<?php

namespace App\Http\Controllers;

use App\Mail\emailCreaUsr;
use App\Models\Companias;
use App\Models\Empleados;
use App\Models\Usuarios;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class mantenimiento extends Controller
{
    //region Index
    public function index()
    {
        $title_page = 'Lobby Mantenimientos';
        return view('Mantenimiento.index', compact('title_page'));
    }
    public function empresasIndex(){
        $title_page = 'Mantenimiento de Empresas';
        $Companias = Companias::all();
        return view('Mantenimiento.empresas.credtEmpresasnoEMB')->with([
            'title_page' => $title_page,
            'Companias' => $Companias
        ]);
    }
    public function departamentosIndex(){

    }
    public function colaboradoresIndex(){
        $title_page = 'Mantenimiento de Colaboradores';
        $Colaboradores = Empleados::with(['Usuario', 'compania', 'tipoDoc'])->get();
        return view('Mantenimiento.colaboradores.credtColaboradoresnoEMB')->with([
            'title_page' => $title_page,
            'Colabors' => $Colaboradores
        ]);
    }
    //endregion
    //region Crear Editar
    public function creaEditEmpresas(Request $request){
        $companias = new Companias();
        $companias->fill($request->all());
        $order = array('(', ')', '-');
        $companias->tel_Companias = str_replace($order, '', $companias->tel_Companias);
        try {
            if ($companias->cod_Companias == '0') {
                $x = $companias->save();
                $dat = Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $CompaniasUp = Companias::find($companias->cod_Companias);
                $CompaniasUp->nomb_Companias = $companias->nomb_Companias;
                $CompaniasUp->nit_Companias = $companias->nit_Companias;
                $CompaniasUp->tel_Companias = $companias->tel_Companias;
                $CompaniasUp->direccion_companias = $companias->direccion_companias;
                $CompaniasUp->logo_companias = $companias->logo_companias;
                $CompaniasUp->correo_companias = $companias->correo_companias;
                $CompaniasUp->save();
                $dat = Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se modifico  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Error: ' . $e,
                'error' => true
            ]);
        }
    }
    public function creaEditDepartamentos(Request $request){

    }
    public function creaEditColaboradores(Request $request){
        $clbrdrs = new Empleados();
        $clbrdrs->fill($request->all());
        $nombArr = array(0 => $request->only('apellido1')['apellido1'],
            1 => $request->only('apellido2')['apellido2'],
            2 => $request->only('nombre1')['nombre1'],
            3 => $request->only('nombre2')['nombre2']);
        $clbrdrs->nombre_Empleado = implode("/", $nombArr);
        $clbrdrs->fecha_Nac_Empleado = Carbon::createFromFormat('d/m/Y', $clbrdrs->fecha_Nac_Empleado);
        $order = array('(', ')', '-');
        $clbrdrs->telf_Celular_Empleado = str_replace($order, '', $clbrdrs->telf_Celular_Empleado);
        $clbrdrs->telf_Corporativo_Empleado = str_replace($order, '', $clbrdrs->telf_Corporativo_Empleado);
        $clbrdrs->tipo_Doc_Empleado = '5';
        try {
            if ($clbrdrs->cod_Empleado == '0') {
                $clbrdrs->save();
                if ($request->has('crearUsrHezeCase') ? true : false) {
                    $creaUsuario = $request->only('crearUsrHezeCase')['crearUsrHezeCase'];
                    if ($creaUsuario == 'on') {
                        $clave = Str::random(6);
                        $usuarioCreado = Usuarios::create([
                            'cod_Empleado' => $clbrdrs->cod_Empleado,
                            'email' => $clbrdrs->email_contacto,
                            'password' => bcrypt($clave),
                            'cod_Rol' => 1
                        ]);
                        if ($usuarioCreado->id_Usuarios != 0) {
                            $objMail = new \stdClass();
                            $objMail->usuario = $clbrdrs->email_contacto;
                            $objMail->pass = $clave;
                            $objMail->sender = 'Heze Case';
                            $objMail->receiver = $request->only('nombre1')['nombre1'] . ' ' . $request->only('apellido1')['apellido1'];

                            Mail::to($clbrdrs->email_contacto)->send(new emailCreaUsr($objMail));
                        }
                    }
                }

                $dat = Empleados::with(['Usuario', 'compania', 'tipoDoc'])->get();
                return response()->json([
                    'msg' => 'El colaborador ' . $request->only('nombre1')['nombre1'] . ' ' . $request->only('apellido1')['apellido1'] . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $clbrdrsUP = Empleados::find($clbrdrs->cod_Empleado);
                $clbrdrsUP->documentoEmpleado = $clbrdrs->documentoEmpleado;
                $clbrdrsUP->tipo_Doc_Empleado = $clbrdrs->tipo_Doc_Empleado;
                $clbrdrsUP->nombre_Empleado = $clbrdrs->nombre_Empleado;
                $clbrdrsUP->sexo_Empleado = $clbrdrs->sexo_Empleado;
                $clbrdrsUP->fecha_Nac_Empleado = $clbrdrs->fecha_Nac_Empleado;
                $clbrdrsUP->telf_Celular_Empleado = $clbrdrs->telf_Celular_Empleado;
                $clbrdrsUP->telf_Corporativo_Empleado = $clbrdrs->telf_Corporativo_Empleado;
                $clbrdrsUP->email_contacto = $clbrdrs->email_contacto;
                $clbrdrsUP->email_corporativo = $clbrdrs->email_corporativo;
                $clbrdrsUP->cod_Companias = $clbrdrs->cod_Companias;
                $clbrdrsUP->porc_Descuento = $clbrdrs->porc_Descuento;
                $clbrdrsUP->porc_Ganacia = $clbrdrs->porc_Ganacia;
                $clbrdrsUP->save();
                if ($request->has('crearUsrHezeCase') ? true : false) {
                    $creaUsuario = $request->only('crearUsrHezeCase')['crearUsrHezeCase'];
                    if ($creaUsuario == 'on' && $clbrdrsUP->Usuario == null) {
                        $objMail = new \stdClass();

                        $objMail->demo_one = 'Demo One Value';
                        $objMail->demo_two = 'Demo Two Value';
                        $objMail->sender = 'Heze Case';
                        $objMail->receiver = $request->only('nombre1')['nombre1'] . ' ' . $request->only('apellido1')['apellido1'];

                        Mail::to($clbrdrsUP->email_contacto)->send(new emailCreaUsr($objMail));
                    } elseif ($creaUsuario == 'off' && $clbrdrsUP->Usuario != null) {
                        Usuarios::destroy($clbrdrsUP->Usuario->id_Usuarios);
                    }
                }
                $dat = Empleados::with(['Usuario', 'compania', 'tipoDoc'])->get();
                return response()->json([
                    'msg' => 'El colaborador ' . (explode('/', $clbrdrsUP->nombre_Empleado))[2] . ' ' . (explode('/', $clbrdrsUP->nombre_Empleado))[0] . ' se modifico exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Error: ' . $e,
                'error' => true
            ]);
        }
    }
    //endregion
    //region obtener para editar
    public function getEmpresa($id){
        $data = Companias::find($id);
        return \Response::json($data);
    }
    public function getDepartamento($id){

    }
    public function getColaborador($id){
        try {
            $data = Empleados::with(['Usuario', 'compania', 'tipoDoc'])->find($id);
            return \Response::json($data);
        } catch (Exception $e) {
            return response()->json([
                'msg' => 'Error! ' . $e->getMessage(),
                'error' => true
            ]);

        }
    }
    //endregion
    //region Eliminar
    public function delEmpresa($id){
        try {
            $companias = Companias::where('cod_Companias', $id)->first();;
            if($companias){
                Companias::destroy($id);
                $dat=Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se eliminó correctamente!',
                    'error' => false,
                    'table'=>$dat
                ]);
            }
            else{
                return response()->json([
                    'msg' => 'La empresa seleccionada no existe!',
                    'error' => true
                ]);
            }


        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Error! ' . $e->getMessage(),
                'error' => true
            ]);

        }
    }
    public function delDepartamento($id){

    }
    public function delColaborador($id){
        try {
            $empleado = Empleados::where('cod_Empleado', $id)->get();
            if (!$empleado->isEmpty()) {
                if (((Empleados::whereHas('Usuario', function ($query) use ($id) {
                        $query->where('cod_Empleado', $id);
                    })->get())->count()) > 0) {
                    Usuarios::destroy(($empleado->first())->Usuario->id_Usuarios);
                    Empleados::destroy($id);
                } else
                    Empleados::destroy($id);
                $dat = Empleados::with(['Usuario', 'compania', 'tipoDoc'])->get();
                $nombre = (explode('/', ($empleado->first())['nombre_Empleado']))[2] . ' ' . (explode('/', ($empleado->first())['nombre_Empleado']))[0];
                return response()->json([
                    'msg' => 'El Colaborador ' . $nombre . ' se eliminó correctamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                return response()->json([
                    'msg' => 'el colaborador seleccionado no existe!',
                    'error' => true
                ]);
            }


        } catch (Exception $e) {
            return response()->json([
                'msg' => 'Error! ' . $e->getMessage(),
                'error' => true
            ]);

        }
    }
    //endregion
}