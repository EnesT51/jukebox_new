<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song detail</title>
</head>
<body>
    <ul>
        <h1>Song: {{$detail->name}}</h1>
        <p>Author:{{$detail->author}} </p>
        <p>Releasedate: {{$detail->releasedate}}</p>
        <p>Duration: {{$detail->duration}}</p>
        <p>Genre: {{$detail->genre}}</p>
    </ul>

    <div><a href="{{route('song.index')}}">Go Back</a></div>
</body>
</html>