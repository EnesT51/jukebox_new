@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>m</title>
</head>

<body>
        @section('menu')
        <nav>
            <a href="{{route('genre.index')}}">Genres</a>
            <a href="{{route('song.index')}}">Songs</a>
            <a href="{{route('playlist.index')}}">Playlist</a>
        </nav>
        @endsection()
</body>

</html>


