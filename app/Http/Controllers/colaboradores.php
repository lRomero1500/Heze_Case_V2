<?php

namespace App\Http\Controllers;

use App\Mail\emailCreaUsr;
use App\Models\Empleados;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class colaboradores extends Controller
{
    public function index()
    {
        $title_page = 'Mantenimiento de Colaboradores';
        $Colaboradores = Empleados::all();
        return view('colaboradores/credtColaboradoresnoEMB')->with([
            'title_page' => $title_page,
            'Colabors' => $Colaboradores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clbrdrs = new Empleados();
        $clbrdrs->fill($request->all());
        $nombArr = array(0 => $request->only('apellido1')['apellido1'],
            1 => $request->only('apellido2')['apellido2'],
            2 => $request->only('nombre1')['nombre1'],
            3 => $request->only('nombre2')['nombre2']);
        $clbrdrs->nombre_Empleado = implode("/", $nombArr);
        $order = array('(', ')', '-');
        $clbrdrs->telf_Celular_Empleado = str_replace($order, '', $clbrdrs->telf_Celular_Empleado);
        $clbrdrs->telf_Corporativo_Empleado = str_replace($order, '', $clbrdrs->telf_Corporativo_Empleado);
        $clbrdrs->tipo_Doc_Empleado='5';
        try {
            if ($clbrdrs->cod_Empleado == '0') {
                $clbrdrs->save();
                $creaUsuario=$request->only('crearUsrHezeCase')['crearUsrHezeCase'];
                if($creaUsuario=='on'){
                    $clave=Str::random(6);
                    $usuarioCreado=Usuarios::create([
                        'cod_Empleado'=>$clbrdrs->cod_Empleado,
                        'email'=>$clbrdrs->email_contacto,
                        'password'=>bcrypt($clave),
                        'cod_Rol'=>1
                    ]);
                    if($usuarioCreado->id_Usuarios!=0){
                        $objMail = new \stdClass();
                        $objMail->usuario = $clbrdrs->email_contacto;
                        $objMail->pass = $clave;
                        $objMail->sender = 'Heze Case';
                        $objMail->receiver = $request->only('nombre1')['nombre1'].' '.$request->only('apellido1')['apellido1'];

                        Mail::to($clbrdrs->email_contacto)->send(new emailCreaUsr($objMail));
                    }
                }
                $dat = Empleados::all();
                return response()->json([
                    'msg' => 'El colaborador ' . $request->only('nombre1')['nombre1'].' '.$request->only('apellido1')['apellido1'] . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $clbrdrsUP = Companias::find($clbrdrs->cod_Empleado);
                $clbrdrsUP->documentoEmpleado=$clbrdrs->documentoEmpleado;
                $clbrdrsUP->tipo_Doc_Empleado=$clbrdrs->tipo_Doc_Empleado;
                $clbrdrsUP->nombre_Empleado=$clbrdrs->nombre_Empleado;
                $clbrdrsUP->sexo_Empleado=$clbrdrs->sexo_Empleado;
                $clbrdrsUP->fecha_Nac_Empleado=$clbrdrs->fecha_Nac_Empleado;
                $clbrdrsUP->telf_Celular_Empleado=$clbrdrs->telf_Celular_Empleado;
                $clbrdrsUP->telf_Corporativo_Empleado=$clbrdrs->telf_Corporativo_Empleado;
                $clbrdrsUP->email_contacto=$clbrdrs->email_contacto;
                $clbrdrsUP->email_corporativo=$clbrdrs->email_corporativo;
                $clbrdrsUP->cod_Companias=$clbrdrs->cod_Companias;
                $clbrdrsUP->porc_Descuento=$clbrdrs->porc_Descuento;
                $clbrdrsUP->porc_Ganacia=$clbrdrs->porc_Ganacia;
                $clbrdrsUP->save();
                $creaUsuario=$request->only('crearUsrHezeCase')['crearUsrHezeCase'];
                if($creaUsuario=='on' && $clbrdrsUP->Usuario ==null){
                    $objMail = new \stdClass();

                    $objMail->demo_one = 'Demo One Value';
                    $objMail->demo_two = 'Demo Two Value';
                    $objMail->sender = 'Heze Case';
                    $objMail->receiver = $request->only('nombre1')['nombre1'].' '.$request->only('apellido1')['apellido1'];

                    Mail::to($clbrdrsUP->email_contacto)->send(new emailCreaUsr($objMail));
                }
                elseif($creaUsuario=='off' && $clbrdrsUP->Usuario !=null){
                    Usuarios::destroy($clbrdrsUP->Usuario->id_Usuarios);
                }
                $dat = Empleados::all();
                return response()->json([
                    'msg' => 'El colaborador ' .(explode('/', $clbrdrsUP->nombre_Empleado))[2] . ' ' . (explode('/', $clbrdrsUP->nombre_Empleado))[0] . ' se modifico exitosamente!',
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Empleados::find($id);
        return \Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
                $dat = Empleados::all();
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
}
