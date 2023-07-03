<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('song.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('song.create')->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'releasedate' => ['date', 'required'],
            'duration' => ['required', 'integer'],
            'genre' => ['required', 'string']
        ]);

        Song::create([
            'name' => $request['name'],
            'author' => $request['author'],
            'releasedate' => $request['releasedate'],
            'duration' => $request['duration'],
            'genre' => $request['genre']
        ]);
        return redirect(route('song.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $song = Song::find($id);
        return view('song.detail', ['detail' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        Song::destroy($song->id);
        return redirect(route('song.index'));
    }
}
