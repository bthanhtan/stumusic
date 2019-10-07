<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singer;
class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singers = Singer::select()->get();
        return view('admin.singer.list', ['singers' => $singers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.singer.form');
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
        ];
        $request->validate($rule);
        $data_create = $request->all();
        dd($request->image->getClientOriginalExtension());
        $data_create['image'] = $this->uploadImage($request->image);
        Singer::create($data_create);
        return redirect()->route('admin.singer_index');
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
        $singer = Singer::find($id);
        return view('admin.singer.form',['singer' => $singer]);    
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
        $musician = Singer::find($id);
        $request->validate($rule);
        $data_update = $request->all();
        $data_update['image'] = $this->uploadImage($request->image);
        if ($musician->update($data_update)) {
             unlink(public_path($data_update['image_old']));
         } 
        return redirect()->route('admin.singer_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singer = Singer::find($id);
        $link_image= $musician['image'];
        if ($singer->delete()) {
            unlink(public_path($link_image));
        }
        return redirect()->route('admin.singer_index');
    }
}
