<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlist = Playlist::all();
        return view('playlist.index', ['playlist' => $playlist]);
    }
    public function create()
    {
        return view('playlist.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>['Required']
        ]);

        Playlist::create([
            'name' => $request['name']
        ]);
        return redirect(route('playlist.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $id)
    {

        $playlist = Playlist::with('songs')->find($id->id);
        $songsInPlaylist = $playlist->songs;
        //dd($songsInPlaylist);
        return view('playlist/showplaylist', ['playlist' => $playlist, 'songs' => $songsInPlaylist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        Playlist::destroy($playlist->id);
        return redirect(route('playlist.index'));
    }
}
