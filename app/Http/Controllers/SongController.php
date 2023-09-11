<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Playlist;
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
        $playlists = Playlist::all();
        return view('song.index', ['songs' => $songs, 'playlists' => $playlists]);
    }
    public function addSongsToPlaylist(Request $request)
    {
        
        $request->validate([
            'playlist' => 'required|exists:playlists,id',
            'song_id' => 'required|exists:songs,id',
        ]);
        $playlist = Playlist::find($request->input('playlist'));
        $songId = $request->input('song_id');
        if($playlist->songs->contains($songId)){
            return redirect()->back();
        }
        $playlist->songs()->attach($songId);

        return redirect(route('song.index'));
    }
    public function RemoveSongFromPlaylist(Request $request)
    {
        
        $request->validate([
            'playlist' => 'required|exists:playlists,id',
            'song_id' => 'required|exists:songs,id',
        ]);
        // Haal de geselecteerde playlist en song op
        $playlist = Playlist::find($request->input('playlist'));
        $songId = $request->input('song_id');
    
        // Verwijder het nummer uit de afspeellijst
        $playlist->songs()->detach($songId);
        return redirect(route('playlist.index'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        
        return view('song.create')->with(['genres' => $genres]);
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
    public function show(Song $song)
    {
        
    }
    public function SongDetail($id)
    {
        $song = Song::find($id);
        return view('song.detail', ['detail' => $song]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $song = $song::find($song->id);
        $genre = Genre::all();

        return view('song.update', ['song' => $song, 'genres' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $validate = $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'releasedate' => ['date', 'required'],
            'duration' => ['required', 'integer'],
            'genre' => ['required', 'string']
        ]);
        $song->update($validate);
        return redirect(route('song.index',['song' => $song]));
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
