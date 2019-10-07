<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singer;
use App\Song;
use App\Musician;
use App\Collection;
use Illuminate\Support\Str;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $audio = $request->audio;
        $destinationPath = public_path('all_song/'); 
        $audio->move($destinationPath);
        dd($audio);
        $file = $request->audio;
        // $a = $request->file($file)->getSize();
        // dd($request->file('audio')->getSize());
        $rule=[
            'name' =>  "required",
            'singer_id' =>  "required",
            'singer_id' =>  "required",
            'type' =>  "required",
        ];
        $request->validate($rule);
        $data_create = $request->all(); 
        $data_create['image'] = $this->uploadImage($request->image);
        $data_create['audio'] = $this->uploadAudio($request->audio, $request->name);
        dd($data_create['audio']);
        Song::create($data_create);
        return redirect()->route('admin.singer_index');
    }
    public function uploadImage($img){
        $name = md5(uniqid(rand(), true)).'_'.time().'.'.$img->getClientOriginalExtension(); 
        $destinationPath = public_path('uploads'); 
        $img->move($destinationPath, $name);
        $nameReturn = 'uploads/'.$name; 
        return $nameReturn;
    }
    public function uploadAudio($audio, $name_request){
        $name_slug = Str::slug($name_request, '-');
        $name_change = $name_slug.'-'.Str::random(5).'.'.$audio->getClientOriginalExtension(); 
        $destinationPath = public_path('all_song/'); 
        $audio->move($destinationPath, $name_change);
        dd($audio);
        $nameReturn = 'all_song/'.$name_change; 
        return $nameReturn;
    }
    public function check_file(Request $request)
    {
        // dd($request->audio);
        $rule = ['audio' => 'required|mimes:jpeg,bmp,png,mp3'];
        if ($request->validate($rule) ==  true) {
            dd('1');
        }else dd('2');

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
