<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Songs - Create</title>
</head>
<body>
    <h1>Add a Song</h1>
    <form method="POST" action="{{route('song.store')}}">
        @csrf
        <label>Vul een naam voor het liedje in</label>
        <input name="name" type="text">
        @error('name')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
        <br>
        <label>Vul een author voor het liedje in</label>
        <input name="author" type="text">
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
        <input name="duration" type="number">
        @error('duration')
            <p style="color:red; display:inline;">{{$message}}</p>
        @enderror()
        <br>
        <select name="genre">
            @foreach($genres as $g)
                <option value="{{$g->name}}">Genre: {{$g->name}}</option>
            @endforeach()
        </select>
        <input type="submit" value="Send me!">
    </form>
</body>
</html>
