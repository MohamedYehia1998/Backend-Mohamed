<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Story</title>
</head>
<body>
    <form action="{{ route('stories.store') }}" method = "POST" style = display:inline>
        @csrf

        <h1>Create a New Story</h1>

        @foreach($errors as $error)
        <div style="color:darkred; background-color: pink">{{ $error ?? '' }}</div>
        @endforeach 
        
        <br>
        <label>Title</label> <br>
        <input type="text" name = "title"> <br> <br>

        <label>Content</label> <br>
        <textarea name="content" cols="30" rows="10"></textarea> <br> <br>

        <button type = "submit">Save</button> 

    </form> 

    <a href="{{ route('stories.index') }}"><button>Back</button></a>
    
</body>
</html>