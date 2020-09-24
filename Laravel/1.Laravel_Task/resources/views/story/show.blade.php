<!DOCTYPE html>
<html>
<head>
<style>

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
</head>
<body>

<style>


#ABC {
      background-color: darkblue;
      height: 40%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }


</style>

<section id="ABC">

<h1 style=position:absolute;left:35%;top:27%;color:black;display:block;font-size:6em;font-style:oblique;>{{ $story->title }}</h1> <br>
<h1 style=position:absolute;left:35%;top:124%;color:black;display:block;font-size:2em;font-style:oblique;>{{ $story->content }}</h1> <br>


<a href="{{route('stories.index')}}"><button style=background-color:lightblue;border-radius:12px;position:absolute;top:200%;width:10%;>Back</button></a> <br><br>


<a href="{{ route('stories.create') }}"><button style=background-color:lightblue;border-radius:12px;position:absolute;top:220%;width:10%;>Add Story</button></a>



</body>
</html>
