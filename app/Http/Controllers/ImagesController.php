<?php

namespace App\Http\Controllers;

use App\Images;
use App\Requests;
use Faker\Provider\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class ImagesController extends Controller
{
    public function test(){
        $data = DB::select("select * from TBL_APP_FC_FOTOS");
        return$data;
    }

    public function index()
    {
        $status = 1;
        $user = Input::get('student_reference');
        $id = DB::table("requests")
            ->select("*")->where("student_id",$user)->get();
        if (count($id) == 1){
            $status = 1;
        }else{
            $status = 0;
        }
        if ($user == ""){
            return "Invalid Path";
        }else if (strlen($user) != 9){
            return "Invalid Path";
        }else{
            $png_url = "profile-".$user.".jpg";
            $path = public_path() . "/images/" . $png_url;
            if (file_exists($path)) {
                return view('ImageFront',compact('png_url','user','status'));
            }else{
                $png_url = "profile-default.png";
                return view('ImageFront',compact('png_url','user','status'));
            }
        }
    }

    public function request(Request $request){
        $png_url = "profile-" . $request->reference . ".jpg";
        $path = public_path() . "/Image_Pending/" . $png_url;
        $img = $request->img;
        $img = substr($img, strpos($img, ",") + 1);
        $data = base64_decode($img);
        if (file_exists($path)) {
            unlink($path);
        }
        $success = file_put_contents($path, $data);

        $data = new Requests();
        $data->new_image = "profile-" . $request->reference . ".jpg";
        $data->student_id = $request->reference;
        $data->status = 1;
        $data->save();
        return response()->json(['status'=>"Changing Image Requests Sent"]);
    }

    public function getRequests(){
        $data = DB::table("requests")
            ->select("*")
            ->get();
        //return $data;
        return view('ImageRequests',compact('data'));
    }

    public function action($id , $status){
        if ($status == 1){
            rename(public_path()."/Image_Pending/profile-".$id.".jpg",public_path()."/images/profile-".$id.".jpg");
            $data = DB::table('requests')->where('student_id','=',$id)->delete();
            return back();
        }else{
            unlink(public_path()."/Image_Pending/profile-$id.jpg");
            $data = DB::table('requests')->where('student_id','=',$id)->delete();
            return back();
        }
    }

}

