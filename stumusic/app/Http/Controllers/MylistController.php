<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mylist;
use App\Song;

class MylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mylists = Mylist::select()->get();
        return view('admin.mylist.list', ['mylists' => $mylists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mylist.form');
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
        ];
        $request->validate($rule);
        $data_create = $request->all();
        Mylist::create($data_create);
        return redirect()->route('admin.mylist_index');
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
        $mylist = Mylist::find($id);
        return view('admin.mylist.form',['mylist' => $mylist]); 
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
        ];
        $mylist = Mylist::find($id);
        $request->validate($rule);
        $data_update = $request->all();
        $mylist->update($data_update);  
        return redirect()->route('admin.mylist_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mylist = Mylist::find($id);
        $mylist->delete();
        return redirect()->route('admin.mylist_index');
    }
}
