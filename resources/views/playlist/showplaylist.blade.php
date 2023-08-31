<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <h1>playlist name: {{$playlist->name}}</h1>
        <h2>songs in playlist: {{$playlist->name}}</h2>
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
    <br>
    <div> <a href="{{route('playlist.index')}}">Go Back</a></div>
</body>
</html>