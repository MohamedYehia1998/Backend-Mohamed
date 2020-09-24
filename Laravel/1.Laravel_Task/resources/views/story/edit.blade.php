<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Story</title>
</head>
<body>
    <form action="{{ route('stories.update', $story->id) }}" method = "POST" style = display:inline>
        @csrf
        @method('PUT')
        <h1>Edit {{ $story->title }}</h1>

        <label>Title</label> <br>
        <input type="text" name = "title" value = "{{ $story->title }}"> <br> <br>

        <label>Content</label> <br>
        <textarea name="content" cols="30" rows="10">{{ $story->content }}</textarea> <br> <br>

        <button type = "submit">Save</button> 

    </form> 

    <a href="{{ route('stories.index') }}"><button>Back</button></a>
    
</body>
</html>