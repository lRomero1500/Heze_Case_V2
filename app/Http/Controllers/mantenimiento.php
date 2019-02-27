<?php

namespace App\Http\Controllers;

use App\Mail\emailCreaUsr;
use App\Models\HezCompania;
use App\Models\HezDepartamento;
use App\Models\HezEmpleado;
use App\Models\HezServicio;
use App\Models\HezUsuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
        $Companias = HezCompania::all();
        return view('Mantenimiento.empresas.credtEmpresasnoEMB')->with([
            'title_page' => $title_page,
            'Companias' => $Companias
        ]);
    }
    public function departamentosIndex(){
        $title_page = 'Mantenimiento de Departamentos';
        $deparamentos= HezDepartamento::all();
        $Companias = HezCompania::all();
        return view('Mantenimiento.departamentos.credtDepartamentosnoEMB')->with([
            'title_page' => $title_page,
            'departamentos'=>$deparamentos,
            'Companias'=>$Companias
        ]);
    }
    public function colaboradoresIndex(){
        $title_page = 'Mantenimiento de Colaboradores';
        $Colaboradores = HezEmpleado::with(['hez_usuarios', 'hez_compania', 'hez_tipo_documento'])->get();
        return view('Mantenimiento.colaboradores.credtColaboradoresnoEMB')->with([
            'title_page' => $title_page,
            'Colabors' => $Colaboradores
        ]);
    }
    public function serviciosIndex(){
        $title_page = 'Mantenimiento de Servicios';
        $servicios= HezServicio::all();
        return view('Mantenimiento.servicios.credtServiciosnoEMB')->with([
            'title_page' => $title_page,
            'servicios'=>$servicios
        ]);
    }
    //endregion
    //region Crear Editar
    public function creaEditEmpresas(Request $request){
        $companias = new HezCompania();
        $companias->fill($request->all());
        $img_url = "logo-".$companias->cod_Companias.'-'.time();
        if (preg_match('/^data:image\/(\w+);base64,/', $request->get('base64FotPerf'), $type)) {
            if(!File::isDirectory('./Recursos/'.Auth::user()->hez_empleado->cod_Companias.'/img'))
            {
                File::makeDirectory('./Recursos/'.Auth::user()->hez_empleado->cod_Companias.'/img',0755,true);
            }
            if(!File::isDirectory('./Recursos/'.Auth::user()->hez_empleado->cod_Companias.'/img/tumbs')){
                File::makeDirectory('./Recursos/'.Auth::user()->hez_empleado->cod_Companias.'/img/tumbs',0755,true);
            }
            $path = './Recursos/'.Auth::user()->hez_empleado->cod_Companias.'/img/' . $img_url;
            $pathTumb = './Recursos/'.Auth::user()->hez_empleado->cod_Companias.'/img/tumbs/' . $img_url;
            $encoded_base64_image = substr($request->get('base64FotPerf'), strpos($request->get('base64FotPerf'), ',') + 1);
            $decoded_image = base64_decode($encoded_base64_image);
            $imgPNG = Image::make($decoded_image)->encode('png', 30);
            $imgPNG->save($path.'.png');
            $imgPNGTumb = Image::make($decoded_image)->encode('png');
            $imgPNGTumb->resize(100,100);
            $imgPNGTumb->save($pathTumb.'.png');
            $imgWEBP = Image::make($decoded_image)->encode('webp', 50);
            $imgWEBP->save($path.'.webp');
            $imgWEBPTumb = Image::make($decoded_image)->encode('webp');
            $imgWEBPTumb->resize(100,100);
            $imgWEBPTumb->save($pathTumb.'.webp');
        }
        $companias->logo_companias=$img_url;
        $order = array('(', ')', '-');
        $companias->tel_Companias = str_replace($order, '', $companias->tel_Companias);
        try {
            if ($companias->cod_Companias == '0') {
                $x = $companias->save();
                $dat = HezCompania::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $CompaniasUp = HezCompania::find($companias->cod_Companias);
                $CompaniasUp->nomb_Companias = $companias->nomb_Companias;
                $CompaniasUp->nit_Companias = $companias->nit_Companias;
                $CompaniasUp->tel_Companias = $companias->tel_Companias;
                $CompaniasUp->direccion_companias = $companias->direccion_companias;
                $CompaniasUp->logo_companias = $companias->logo_companias;
                $CompaniasUp->correo_companias = $companias->correo_companias;
                $CompaniasUp->save();
                $dat = HezCompania::all();
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
        $departamento= new HezDepartamento();
        $departamento->fill($request->all());
        try {
            if ($departamento->id == '0') {
                $departamento->save();
                $dat = HezDepartamento::with('hez_compania')->get();
                return response()->json([
                    'msg' => 'El departamento ' . $departamento->departamento . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $departamentoUP = HezDepartamento::find($departamento->id);
                $departamentoUP->departamento = $departamento->departamento;
                $departamentoUP->save();
                $dat = HezDepartamento::with('hez_compania')->get();
                return response()->json([
                    'msg' => 'El departamento ' . $departamento->departamento . ' se modifico  exitosamente!',
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
    public function creaEditColaboradores(Request $request){
        $clbrdrs = new HezEmpleado();
        $clbrdrs->fill($request->all());
        $nombArr = array(0 => $request->only('apellido1')['apellido1'],
            1 => $request->only('apellido2')['apellido2'],
            2 => $request->only('nombre1')['nombre1'],
            3 => $request->only('nombre2')['nombre2']);
        $clbrdrs->nombre_Empleado = implode("/", $nombArr);
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
                        $usuarioCreado = HezUsuario::create([
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

                $dat = HezEmpleado::with(['hez_usuarios', 'hez_compania', 'hez_tipo_documento'])->get();
                return response()->json([
                    'msg' => 'El colaborador ' . $request->only('nombre1')['nombre1'] . ' ' . $request->only('apellido1')['apellido1'] . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $clbrdrsUP = HezEmpleado::find($clbrdrs->cod_Empleado);
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
                        HezUsuario::destroy($clbrdrsUP->Usuario->id_Usuarios);
                    }
                }
                $dat = HezEmpleado::with(['hez_usuarios', 'hez_compania', 'hez_tipo_documento'])->get();
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
        $data = HezCompania::find($id);
        return \Response::json($data);
    }

    public function getDepartamento($id){
        $data =  HezDepartamento::with('hez_compania')->find($id);
        return \Response::json($data);
    }
    public function getColaborador($id){
        try {
            $data = HezEmpleado::with(['hez_usuarios', 'hez_compania', 'hez_tipo_documento'])->find($id);
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
            $companias = HezCompania::where('cod_Companias', $id)->first();;
            if($companias){
                HezCompania::destroy($id);
                $dat=HezCompania::all();
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
        try {
            $departamento = HezDepartamento::where('id', $id)->first();
            if($departamento){
                HezDepartamento::destroy($id);
                $dat=HezDepartamento::with('hez_compania')->get();
                return response()->json([
                    'msg' => 'El Departamento ' . $departamento->departamento . ' se eliminó correctamente!',
                    'error' => false,
                    'table'=>$dat
                ]);
            }
            else{
                return response()->json([
                    'msg' => 'El departamento seleccionado no existe',
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
    public function delColaborador($id){
        try {
            $empleado = HezEmpleado::where('cod_Empleado', $id)->get();
            if (!$empleado->isEmpty()) {
                if (((HezEmpleado::whereHas('hez_usuarios', function ($query) use ($id) {
                        $query->where('cod_Empleado', $id);
                    })->get())->count()) > 0) {
                    $z=$empleado->first()->hez_usuarios;
                    HezUsuario::destroy(($empleado->first())->hez_usuarios->id_Usuarios);
                    HezEmpleado::destroy($id);
                } else
                    HezEmpleado::destroy($id);
                $dat = HezEmpleado::with(['hez_usuarios', 'hez_compania', 'hez_tipo_documento'])->get();
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
