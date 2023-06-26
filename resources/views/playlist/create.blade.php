@extends('layouts.master')
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
    <h1>Add a Playlist</h1>
    <form method="POST" action="{{route('playlist.store')}}">
        @csrf
        <label>Vul een naam voor het playlist in</label>
        <input name="name" type="text">
        <input type="submit" value="Send me!">
        @error('name')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
    </form>
</body>
@endsection()
</html>