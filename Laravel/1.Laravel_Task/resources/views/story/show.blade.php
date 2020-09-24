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




<div class="center">
    <p style = font-size:45pt;color:#003366>{{ $story->title }}</p> <br> 
    <p style = font-size:95pt></p>
</div>

<div class="center">
    <p style = font-size:17pt;color:#FF0000>{{ $story->content }}</p>
</div>

<a href="{{route('stories.index')}}">Back</a> <br><br>

<a href="{{route('stories.create')}}">Create a new story</a> <br><br>




</body>
</html>
