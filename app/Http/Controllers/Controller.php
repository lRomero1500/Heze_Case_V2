<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cargaImagenes(string $ImgB64, int $tipo, string $urlIMG)
    {
        switch ($tipo) {
            case 1:/*carga de imagenes mantenimiento de companias*/
                if (preg_match('/^data:image\/(\w+);base64,/', $ImgB64, $type)) {
                    if (!File::isDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img')) {
                        File::makeDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img', 0755, true);
                    }
                    if (!File::isDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs')) {
                        File::makeDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs', 0755, true);
                    }
                    $path = './Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/' . $urlIMG;
                    $pathTumb = './Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs/' . $urlIMG;
                    $encoded_base64_image = substr($ImgB64, strpos($ImgB64, ',') + 1);
                    $decoded_image = base64_decode($encoded_base64_image);
                    $imgPNG = Image::make($decoded_image)->encode('png', 75);
                    $imgPNG->save($path . '.png');
                    $imgPNGTumb = Image::make($decoded_image)->encode('png');
                    $imgPNGTumb->resize(100, 100);
                    $imgPNGTumb->save($pathTumb . '.png');
                    /*$imgWEBP = Image::make($decoded_image)->encode('webp', 75);
                    $imgWEBP->save($path . '.webp');
                    $imgWEBPTumb = Image::make($decoded_image)->encode('webp');
                    $imgWEBPTumb->resize(100, 100);
                    $imgWEBPTumb->save($pathTumb . '.webp');*/
                }
                break;
                case 2:/*carga de imagenes mantenimiento de Colaboradores*/
                if (preg_match('/^data:image\/(\w+);base64,/', $ImgB64, $type)) {
                    if (!File::isDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img')) {
                        File::makeDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img', 0755, true);
                    }
                    if (!File::isDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs')) {
                        File::makeDirectory('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs', 0755, true);
                    }
                    $path = './Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/' . $urlIMG;
                    $pathTumb = './Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs/' . $urlIMG;
                    $encoded_base64_image = substr($ImgB64, strpos($ImgB64, ',') + 1);
                    $decoded_image = base64_decode($encoded_base64_image);
                    $imgPNG = Image::make($decoded_image)->encode('png', 75);
                    $imgPNG->save($path . '.png');
                    $imgPNGTumb = Image::make($decoded_image)->encode('png');
                    $imgPNGTumb->resize(100, 100);
                    $imgPNGTumb->save($pathTumb . '.png');
                   /* $imgWEBP = Image::make($decoded_image)->encode('webp', 75);
                    $imgWEBP->save($path . '.webp');
                    $imgWEBPTumb = Image::make($decoded_image)->encode('webp');
                    $imgWEBPTumb->resize(100, 100);
                    $imgWEBPTumb->save($pathTumb . '.webp');*/
                }
                break;
        }
    }

    public function eliminaImagenes(string $urlIMG, int $tipo)
    {
        switch ($tipo) {
            case 1:
                if (!empty($urlIMG)) {
                    foreach (glob('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/' . $urlIMG . '*') as $filename) {
                        unlink(realpath($filename));
                    }
                    foreach (glob('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs/' . $urlIMG . '*') as $filename2) {
                        unlink(realpath($filename2));
                    }
                }
                break;
                case 2:
                if (!empty($urlIMG)) {
                    foreach (glob('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/' . $urlIMG . '*') as $filename) {
                        unlink(realpath($filename));
                    }
                    foreach (glob('./Recursos/' . Auth::user()->hez_empleado->cod_Companias . '/img/tumbs/' . $urlIMG . '*') as $filename2) {
                        unlink(realpath($filename2));
                    }
                }
                break;
        }
    }
}
