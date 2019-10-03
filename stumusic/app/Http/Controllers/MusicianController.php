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
        ];
        $request->validate($rule);
        $data_create = $request->all();
        Musician::create($data_create);
        return redirect()->route('admin.musician_index');
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
        $musician->update($data_update);  
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
        $musician->delete();
        return redirect()->route('admin.musician_index');
    }
}
