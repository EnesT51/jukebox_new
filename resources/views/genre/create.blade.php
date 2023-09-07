<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genres - Create</title>
</head>

<body>
    <h1>Add a Genre</h1>
    <form method="POST" action="{{route('genre.store')}}">
        @csrf
        <label>Vul een naam voor het genre in</label>
        <input name="genreName" type="text">
        <input type="submit" value="Send me!">
        @error('genreName')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
    </form>
    <div><a href="{{route('genre.index')}}">Go Back</a></div>
    
    
</body>
</html>


