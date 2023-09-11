@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist - Create</title>
</head>
@section('content')
<body>
    <h1>Update playlist</h1>
    <form method="get" action="{{ route('playlist.update', ['playlist' => $playlist])}}">
        @csrf
        <label>Vul een naam voor het playlist in</label>
        <input name="name" type="text" value="{{$playlist->name}}">
        <input type="submit" value="Update!">
        @error('name')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
    </form>
    <a href="{{route('playlist.index')}}">Go back</a>
</body>
@endsection()
</html>