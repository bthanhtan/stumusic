<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Image;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::select()->get();
        return view('admin.author.list', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.form');
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
            'nameimage' =>  "required",
        ];
        $request->validate($rule);
        $data_create = [
            'name' => $request->name,
            'image' => $request->nameimage,
            'content' => $request->content,
            'follow' => 0,
        ];
        if ($author = Author::create($data_create)) {
            $data_image = [
               "src" => $data_create['image'],
            ];
            $author->images()->create($data_image);
        }
        return redirect()->route('admin.author_index');
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
        $author = Author::find($id);
        return view('admin.author.form',['author' => $author]);  
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
        $author = Author::find($id);
        if ($author->update($data_update)) {
            if ($data_update['image'] != $data_update['image_old']) {
                $data_image = [
                   "src" => $data_update['image'],
                ];
                $author->images()->update($data_image);
                unlink(public_path($data_update['image_old']));
            }
             
         } 
        return redirect()->route('admin.author_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $id_image_artis = $author->images[0]->id;
        $author_image = Image::find($id_image_artis);
        $link_image= $author->images[0]->src;
        if ($author->delete()) {
            $author_image->delete();
            unlink(public_path($link_image));
        }
        return redirect()->route('admin.author_index');
    }
}
