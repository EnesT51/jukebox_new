@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song edit</title>
</head>
<body>
@section('content')
    <h1>Update a Song</h1>
    <form method="get" action="{{route('song.update', ['song' => $song])}}">
        @csrf
        <label>Vul een naam voor het liedje in</label>
        <input name="name" type="text" value="{{$song->name}}">
        @error('name')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
        <br>
        <label>Vul een author voor het liedje in</label>
        <input name="author" type="text" value="{{$song->author}}">
        @error('author')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
        <br>
        <label>Vul een releasedate voor het liedje in</label>
        <input name="releasedate" type="date">
        @error('releasedate')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
        <br>
        <label>Vul een duratie voor het liedje in</label>
        <input name="duration" type="number" value="{{$song->duration}}">
        @error('duration')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
        <br>
        <select name="genre">
            @foreach($genres as $g)
                <option value="{{$g->name}}">Genre: {{$g->name}}</option>
            @endforeach()
        </select>
        <input type="submit" value="Update">
    </form>
    <a href="{{route('song.index')}}">go back</a>
@endsection()
</body>
</html>