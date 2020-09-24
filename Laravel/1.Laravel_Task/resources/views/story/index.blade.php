<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Stories</title>
</head>
<body>
    <h1>All Stories</h1>

    <div style="color:darkgreen; background-color: lightgreen">{{ $success ?? '' }}</div>

    <ul>
        @foreach($stories as $story)
        <li><a href="{{ route('stories.show', $story->id) }}">{{$story->title}}</a> 
        <a href="{{ route('stories.edit', $story->id) }}"><button>Edit</button></a> 
        <form action="{{route('stories.destroy', $story->id)}}" method="post" style = display:inline> @csrf @method('DELETE') <button> Delete</button></form>
        </li> 
        @endforeach
    </ul>
    
    <a href="{{ route('stories.create') }}"><button>Add Story</button></a>

</body>
</html>