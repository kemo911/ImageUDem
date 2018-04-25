<?php

namespace App\Http\Controllers;

use App\Images;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class ImagesController extends Controller
{
    public function index()
    {
        $user = Input::get('student_reference');
        if ($user == ""){
            return "Invalid Path";
        }else if (strlen($user) != 9){
            return "Invalid Path";
        }else{
            $png_url = "profile-".$user.".jpg";
            $path = public_path() . "/images/" . $png_url;
            if (file_exists($path)) {
                return view('ImageFront',compact('png_url','user'));
            }else{
                $png_url = "profile-default.png";
                return view('ImageFront',compact('png_url','user'));
            }
        }
    }

    public function SubmitDate(Request $request)
    {
        $png_url = "profile-" . $request->reference . ".jpg";
        $path = public_path() . "/images/" . $png_url;
        $img = $request->img;
        $img = substr($img, strpos($img, ",") + 1);
        $data = base64_decode($img);
        if (file_exists($path)) {
            unlink($path);
        }
        $success = file_put_contents($path, $data);
        $check = Images::where('ref_number',$request->reference)->first();
        if (count($check) == 1){
            $check->ref_number = $request->reference;
            $check->update();
        }else{
            $new = new Images();
            $new->insertUser($request->reference);
        }
        return response()->json(['status' => "Successfully Updated"]);
    }
}

