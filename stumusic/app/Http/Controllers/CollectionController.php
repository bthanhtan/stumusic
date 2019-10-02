<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::select()->get();
        return view('admin.collection.list', ['collections' => $collections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collection.form');
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
            'country' =>  "required",
            'type' =>  "required",
        ];
        $request->validate($rule);
        $data_create = $request->all();
        Collection::create($data_create);
        return redirect()->route('admin.collection_index');
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
        $collection = Collection::find($id);
        return view('admin.collection.form',['collection' => $collection]);    
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
            'country' =>  "required",
            'type' =>  "required",
        ];
        $collection = Collection::find($id);
        $request->validate($rule);
        $data_update = $request->all();
        $collection->update($data_update);  
        return redirect()->route('admin.collection_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();
        return redirect()->route('admin.collection_index');
    }
}
