<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musician;
class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicians = Musician::select()->get();
        return view('admin.musician.list', ['musicians' => $musicians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musician.form');
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
            'content' =>  "required",
            'image' =>  "required",
        ];
        $request->validate($rule);
        $data_create = [
            'name' => $request->name,
            'image' => $request->nameimage,
            'content' => $request->content,
            'follow' => 0,
        ];
        // dd($data_create);
        if ($musician = Musician::create($data_create)) {
            $data_image = [
               "src" => $data_create['image'],
            ];
            // dd($data_audio);
            $musician->images()->create($data_image);
        }
        return redirect()->route('admin.musician_index');
    }
    public function uploadImage($img){
        $name = md5(uniqid(rand(), true)).'_'.time().'.'.$img->getClientOriginalExtension(); 
        $destinationPath = public_path('uploads'); 
        $img->move($destinationPath, $name);
        $nameReturn = 'uploads/'.$name; 
        return $nameReturn;
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
        $musician = Musician::find($id);
        return view('admin.musician.form',['musician' => $musician]);    
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
        ];
        $musician = Musician::find($id);
        $request->validate($rule);
        $data_update = $request->all();
        $data_update['image'] = $this->uploadImage($request->image);
        if ($musician->update($data_update)) {
             unlink(public_path($data_update['image_old']));
         } 
        return redirect()->route('admin.musician_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musician = Musician::find($id);
        $link_image= $musician['image'];
        if ($musician->delete()) {
            unlink(public_path($link_image));
        }
        return redirect()->route('admin.musician_index');
    }
}
