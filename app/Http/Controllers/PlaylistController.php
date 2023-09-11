<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\User;
class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::User();
        if($user){

            $userpl = $user->playlists;
        }
        return view('playlist.index', ['playlist' => $userpl]);
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
        $user = Auth::user();

        $request->validate([
            'name' =>['Required']
        ]);

        $playlist = $user->playlists()->create([
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
        $song = $songsInPlaylist->find($id->id);
        return view('playlist/showplaylist', ['playlist' => $playlist, 'songs' => $songsInPlaylist, 'song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $pl = $user->playlists->find($id);
        return view('playlist.update', ['playlist' => $pl]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = Auth::user();
        $validate = $request->validate([
            'name' => ['required']
        ]);

        $user->playlists->find($id)->update($validate);

        return redirect(route('playlist.index'));
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
