@extends('layouts.master')
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genre - index</title>
</head>
@section('content')
<body>
    <h1>Dit is een totaaloverzicht van alle Genres</h1>
    <ul>
        @foreach($genres as $genre)
        <li>{{$genre->name}} <a href="{{route('genre.destroy', ['genre' => $genre->id])}}">Delete</a></li>
        @endforeach
    </ul>

    <a href="{{route('genre.create')}}">Create a genre</a>

</body>
@endsection()
</html>