@extends('layouts.master')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist - index</title>
</head>
@section('content')
<body>
    <h1>Dit is een totaaloverzicht van alle Playlists</h1>
    <ul>
    @foreach($playlist as $playlists)
        <li>{{$playlists->name}} <a href="{{route('playlist.destroy', ['playlist' => $playlists->id])}}">X</a></li>
    @endforeach
    </ul>

    <a href="{{route('playlist.create')}}">Create a playlist</a>

</body>
@endsection()
</html>
