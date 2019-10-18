<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Collection;
use App\Singer;
use App\Song;
use App\Musician;
use App\UrlSong;
class ImageController extends Controller
{
    public function check_file(Request $request)
    {
        $name_request = $request->audio;
        $rule = [ 'audio' =>'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'];
        $validator = $request->validate($rule);
        if ($request->validate($rule) == true){
            $name_change = md5(uniqid(rand(), true)).'_'.time().'.'.$name_request->getClientOriginalExtension();
            $destinationPath = public_path('all_song/'); 
            $name_request->move($destinationPath, $name_change);
            $nameReturn = 'all_song/'.$name_change;
            return response()->json($nameReturn);
        }
        return 1; 
    }
    public function check_image(Request $request)
    {
        $img = $request->image;
        $rule = [ 'image' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048' ];
        if ($request->validate($rule) == true) {
            $name = md5(uniqid(rand(), true)).'_'.time().'.'.$img->getClientOriginalExtension(); 
            $destinationPath = public_path('uploads'); 
            $img->move($destinationPath, $name);
            $nameReturn = 'uploads/'.$name; 
            return response()->json($nameReturn);
        }
        return 1; 
    }
}
