<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mylist;
use App\Song;
use App\Mylist_detail;
class Mylist_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mylist_details = Mylist_detail::select()->get();
        return view('admin.mylist_detail.list', ['mylist_details' => $mylist_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mylist_detail.form');
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
            'mylist_id' =>  "required",
            'song_id' =>  "required",
        ];
        $request->validate($rule);
        $data_create = $request->all();
        Mylist_detail::create($data_create);
        return redirect()->route('admin.mylist_detail_index');
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
        $mylist_detail = Mylist_detail::find($id);
        return view('admin.mylist_detail.form',['mylist_detail' => $mylist_detail]); 
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
            'mylist_id' =>  "required",
            'song_id' =>  "required",
        ];
        $mylist_detail = Mylist_detail::find($id);
        $request->validate($rule);
        $data_update = $request->all();
        $mylist_detail->update($data_update);  
        return redirect()->route('admin.mylist_detail_index');
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
