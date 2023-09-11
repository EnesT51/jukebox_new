@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
@section('content')
<body>

    <div>
        <h1>playlist name: {{$playlist->name}}</h1>
    </div>
    <form action="{{ route('remove-song-from-playlist') }}" method="post" id="removeSongForm">
    @csrf
    <input type="hidden" name="playlist" value="{{ $playlist->id }}">
    <select name="song_id">
        <option value="">Verwijder song</option>
        @foreach ($playlist->songs as $song)
            <option value="{{ $song->id }}">{{ $song->name }}</option>
        @endforeach
    </select>
    <button type="submit">Verwijder</button>
</form>
<br><br>
    <div>
        @foreach($songs as $song)
            <li><strong>Song name: </strong>{{$song->name}} <strong>Author: </strong>{{$song->author}}</li>
        @endforeach()
    </div>
    @if(isset($song))
    <div class="pe-10">
        <p>Playlist duration:<strong> {{number_format($song->duration / 60 ,2)}}</strong>min</p>
    </div>
    @endif()
    <br>
    <div> <a href="{{route('playlist.index')}}">Go Back</a></div>
</body>
@endsection()
</html>