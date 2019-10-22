<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Image;
class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $artists = Artist::select()->get();
        return view('admin.artist.list', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rule=[
            'name' =>  "required",
            'content' =>  "required",
            'nameimage' =>  "required",
        ];
        $request->validate($rule);
        $data_create = [
            'name' => $request->name,
            'image' => $request->nameimage,
            'content' => $request->content,
            'follow' => 0,
        ];
        if ($artist = Artist::create($data_create)) {
            $data_image = [
               "src" => $data_create['image'],
            ];
            $artist->images()->create($data_image);
        }
        return redirect()->route('admin.artist_index');
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
        $artist = Artist::find($id);
        return view('admin.artist.form',['artist' => $artist]);    
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
         $rule=[
            'name' =>  "required",
            'content' =>  "required",
            'nameimage' =>  "required",
        ];
        $request->validate($rule);
        $data_update = [
            'name' => $request->name,
            'image' => $request->nameimage,
            'image_old' => $request->nameimage_old,
            'content' => $request->content,
        ];
        $artist = Artist::find($id);
        if ($artist->update($data_update)) {
            if ($data_update['image'] != $data_update['image_old']) {
                $data_image = [
                   "src" => $data_update['image'],
                ];
                $artist->images()->update($data_image);
                unlink(public_path($data_update['image_old']));
            }
             
         } 
        return redirect()->route('admin.artist_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        $id_image_artis = $artist->images[0]->id;
        $artist_image = Image::find($id_image_artis);
        $link_image= $artist->images[0]->src;
        if ($artist->delete()) {
            $artist_image->delete();
            unlink(public_path($link_image));
        }
        return redirect()->route('admin.artist_index');
    }
}
