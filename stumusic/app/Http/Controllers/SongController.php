<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Genre;
use App\Artist;
use App\Song;
use App\Author;
use App\UrlSong;
use App\Image;
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
        $artists = Artist::select()->get();
        $authors = Author::select()->get();
        $genres = Genre::select()->get();
        // dd($artists);
        return view('admin.song.form',['artists' => $artists, 'authors' => $authors, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        dd($request->all());
=======
>>>>>>> 0ac42f8d865979736c942268bf3957a3c1ab5bf5
        $rule=[
            'name' =>  "required",
            'nameimage' =>  "required",
            'nameaudio' =>  "required",
            'artist_id' =>  "required",
            'author_id' =>  "required",
            'genre_id' =>  "required",
        ];
        $request->validate($rule);
        $data_create = [
            'name' =>  $request->name,
            'hot' => 0,
            'artist_id' =>  $request->artist_id,
            'author_id' =>  $request->author_id,
            'image' => $request->nameimage,
            'audio' => $request->nameaudio,
            'genre_id' =>  $request->genre_id,
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
            $song->images()->create($data_image);
            $song->urlsongs()->create($data_audio);
        }
        
        return redirect()->route('admin.song_index');
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
        $song = Song::find($id);
        $name_image = $song->images()->select()->get();
        $name_audio = $song->urlsongs()->select()->get();
        $artist = Artist::find($song->artist_id);
        $genre = Genre::find($song->genre_id);
        $author = Author::find($song->author_id);
        $artists = Artist::select()->get();
        $authors = Author::select()->get();
        $genres = Genre::select()->get();
        return view('admin.song.form',['song' => $song, 'artists' => $artists, 'authors' => $authors, 'genres' => $genres, 'artist' => $artist, 'genre' => $genre, 'author' => $author, 'name_image' => $name_image, 'name_audio' => $name_audio]);    
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
        // dd($request->all());
        $rule=[
            'name' =>  "required",
            'nameimage' =>  "required",
            'nameaudio' =>  "required",
            'artist_id' =>  "required",
            'author_id' =>  "required",
            'genre_id' =>  "required",
        ];
        $request->validate($rule);
        $data_update = [
            'name' =>  $request->name,
            'artist_id' =>  $request->artist_id,
            'author_id' =>  $request->author_id,
            'image' => $request->nameimage,
            'audio' => $request->nameaudio,
            'genre_id' =>  $request->genre_id,
            'image_old' =>  $request->nameimage_old,
            'audio_old' =>  $request->nameaudio_old,
        ];
        $song = Song::find($id);
        if ($song->update($data_update)) {
            if ($data_update['image'] != $data_update['image_old']) {
                $data_image = [
                   "src" => $data_update['image'],
                ];
                $data_audio = [
                   "src" => $data_update['audio'],
                   "song_id" => $song->id,
                ];
                $song->images()->update($data_image);
                $song->urlsongs()->update($data_audio);
                unlink(public_path($data_update['image_old']));
                unlink(public_path($data_update['audio_old']));
            }
        }
        return redirect()->route('admin.song_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        $id_image_song = $song->images[0]->id;
        $id_audio_song = $song->urlsongs->id;
        $song_image = Image::find($id_image_song);
        $song_audio = UrlSong::find($id_audio_song);
        $link_image= $song_image->src;
        $link_audio= $song_audio->src;
        // dd($link_audio);
        if ($song->delete()) {
            $song_image->delete();
            $song_audio->delete();
            unlink(public_path($link_image));
            unlink(public_path($link_audio));
        }
        return redirect()->route('admin.song_index');
    }


}
