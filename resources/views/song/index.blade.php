@extends('layouts.master')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Songs - Index</title>
</head>
@section('content')
<body>
    <h1>Dit is een totaaloverzicht van alle Songs</h1>

    <form action="{{ route('add-song-to-playlist') }}" method="post" id="addSong">
        @csrf
        <label>Add song to playlist</label>
        <select name="playlist" id="playlistSelect">
            <option value="">Select a playlist</option>
            @foreach($playlists as $playlist)
                <option value="{{$playlist->id}}">{{$playlist->name}}</option> 
            @endforeach()
        </select>
        <select name="song_id" id="songSelect">
        <option value="">Select a song</option>
        @foreach($songs as $song)
            <option value="{{$song->id}}" id="songId">{{$song->name}}</option> 
        @endforeach()
    </select>
    <button type="submit">Add</button>
    </form>

    <br>

    <ul>
    @foreach($songs as $song)
        <li>{{$song->name}} - {{$song->author}} | Released in {{$song->releasedate}} | is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach 
            <a href="/song/detail/{{ $song->id }}">Song Info</a> 
            <a href="{{route('song.destroy', ['song' => $song->id])}}">Delete</a>
        </li>
    @endforeach
    </ul>

    <a href="{{route('song.create')}}">Create a song</a>
</body>
@endsection()
</html>
