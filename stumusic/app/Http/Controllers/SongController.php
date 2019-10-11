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
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::select()->get();
        return view('admin.song.list', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $singers = Singer::select()->get();
        $mucicians = Musician::select()->get();
        $collections = Collection::select()->get();
        return view('admin.song.form',['singers' => $singers, 'mucicians' => $mucicians, 'collections' => $collections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rule=[
            'name' =>  "required",
            'singer_id' =>  "required",
            'musician_id' =>  "required",
            'type' =>  "required",
            'image' =>  "required",
            'audio' =>  "required",
        ];
        $request->validate($rule);
        $data_create = [
            'name' =>  $request->name,
            'image' => $request->nameimage,
            'audio' => $request->nameaudio,
            'hot' => 0,
            'singer_id' =>  $request->singer_id,
            'musician_id' =>  $request->musician_id,
            'type' =>  0,
            'view' => 0,
            'heart' => 0,
        ];
        if ($song = Song::create($data_create)) {
            $data_image = [
               "src" => $data_create['image'],
            ];
            $data_audio = [
               "src" => $data_create['audio'],
               "song_id" => $song->id,
            ];
            // dd($data_audio);
            $song->images()->create($data_image);
            $song->urlsongs()->create($data_audio);
        }
        
        return redirect()->route('admin.song_index');
    }
    public function uploadImage($img){
        $name = md5(uniqid(rand(), true)).'_'.time().'.'.$img->getClientOriginalExtension(); 
        $destinationPath = public_path('uploads'); 
        $img->move($destinationPath, $name);
        $nameReturn = 'uploads/'.$name; 
        return $nameReturn;
    }
    public function uploadAudio($audio, $name_request){
        // dd($audio->getSize());
        $name_slug = Str::slug($name_request, '-');
        $name_change = $name_slug.'-'.Str::random(5).'.'.$audio->getClientOriginalExtension(); 
        $destinationPath = public_path('all_song/'); 
        $audio->move($destinationPath, $name_change);
        $nameReturn = 'all_song/'.$name_change; 
        return $nameReturn;
    }
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
            // dd($nameReturn);
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
