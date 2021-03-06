<?php

namespace App\Http\Controllers;

use App\Models\HezEmpleado;
use App\Models\HezMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class controlAcceso extends Controller
{
    use ThrottlesLogins;

    public function index()
    {
        $title_page = 'Inicio de sesión';
        return view('controlAcceso/login', compact('title_page'));
    }

    public $empleado;

    public function validaUsr(Request $request)
    {

        try {
            $email = $request->only('usrName')['usrName'];
            $data = (HezEmpleado::whereHas('hez_usuarios',function($query) use ($email) {
                $query->where('email_contacto', $email);
            })->first());
            if ($data != null) {
                $nombre = (explode('/', $data['nombre_Empleado']))[2] . ' ' . (explode('/', $data['nombre_Empleado']))[0];
                $ini = mb_substr((explode('/', $data['nombre_Empleado']))[2], 0, 1) . mb_substr((explode('/', $data['nombre_Empleado']))[0], 0, 1);
                $imgPerfil=empty($data->url_ImgPerfil)?'':$data->url_ImgPerfil;
                $msg = null;
            } else {
                $nombre = null;
                $ini = null;
                $imgPerfil=null;
                $msg = "Usuario No Existe";
            }
        } catch (\Exception $e) {
            $nombre = null;
            $ini = null;
            $imgPerfil=null;
            $msg = $e->getMessage();
        }


        return response()->json([
            'nombre' => $nombre,
            'ini' => $ini,
            'imgPerfil' => $imgPerfil,
            'msg' => $msg
        ]);
    }

    public function ingresaUsr(Request $request)
    {
        $email = $request->only('usrName')['usrName'];
        $Pass = $request->only('usrPass')['usrPass'];
        try {
            if (Auth::attempt(['email' => $email, 'password' => $Pass])) {

                $rol = Auth::user()->hez_role;
                $menu=HezMenu::query()
                    ->join('hez_detalle_roles','hez_detalle_roles.cod_menu','=','hez_menu.cod_menu')
                    ->where('hez_detalle_roles.cod_Rol','=',$rol->cod_Rol)
                    ->where('activo','=','1')
                    ->orderBy('orden_menu')
                    ->get();
                if (Session::has('menu')) {
                    Session::forget('menu');
                    session(['menu' => $menu]);
                } else
                    session(['menu' => $menu]);

                return response()->json([
                    'msg' => '',
                    'error' => false
                ]);
            } else {
                return response()->json([
                    'msg' => 'Contraseña incorrecta',
                    'error' => true
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'error' => true
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('login');
    }
    public function loginPath()
    {
        return route('/');
    }

}
