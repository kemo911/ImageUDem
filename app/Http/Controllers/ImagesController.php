<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ImagesController extends Controller
{
    public function index(){
        return view('ImageFront');
    }

    public function SubmitDate(Request $request){
        $png_url = "perfil-".$request->reference.".jpg";
        $path = public_path()."/images/".$png_url;
        $img = $request->img;
        $img = substr($img, strpos($img, ",")+1);
        $data = base64_decode($img);
        if (file_exists($path)) {
            unlink($path);
        }
        $success = file_put_contents($path, $data);
        return response()->json(['status'=>"Successfully Updated"]);
    }
}
