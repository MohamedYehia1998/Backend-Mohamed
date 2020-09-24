<!DOCTYPE html>
<html>
<title>All Stories</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<style>

table.center {
  margin-left:auto; 
  margin-right:auto;
}

#ABC {
      background-color: darkblue;
      height: 40%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }


</style>

<div class="w3-container">

<section id="ABC">
  <h1 style=color:white;position:absolute;left:43%;top:10px;>Stories</h1>


  <div style="color:white;height:20% background-color: lightgreen">{{ $success ?? '' }}</div> <br><br><br><br>

  <table class="w3-table-all w3-large" style= margin-left:auto;margin-right:auto;width:67%>
    <tr class = w3-indigo>
      <th>Story Title</th>
      <th>Action</th>
    </tr>

    @foreach($stories as $story)
    <tr class = w3-hover-blue>
      <td>{{$story->title}}</td>
      <td>
        <a href="{{ route('stories.show', $story->id) }}"><button style=background-color:lightblue;border-radius:50%;>Show</button></a>  
        <a href="{{ route('stories.edit', $story->id) }}"><button style=background-color:lightblue;border-radius:50%;>Edit</button></a> 
        <form action="{{route('stories.destroy', $story->id)}}" method="post" style = display:inline> @csrf @method('DELETE') 
        <button style=background-color:red;border-radius:50%;> Delete</button></form>
      </td>
    </tr>
    @endforeach

  </table>
</div>
<br>
<a href="{{ route('stories.create') }}"><button style=background-color:white;border-radius:12px;color:black;width:20%;position:absolute;left:260px;top:5%>Add Story</button></a>

</body>
</html>