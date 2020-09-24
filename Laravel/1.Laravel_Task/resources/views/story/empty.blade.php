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

#ABC {
      background-color: darkblue;
      height: 40%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }


</style>
</head>
<body style=background-color:white;>

<section id="ABC">


    <p style = font-size:65pt;color:white;position:absolute;top:30%;left:30%;font-weight:900;>No Stories Found</p> <br> 
    <p style = font-size:19pt;color:black;position:absolute;top:100%;left:30%;font-weight:100;>Create a new story to read first!</p> 



    <a href="{{route('stories.create')}}"><button style=background-color:white;border-radius:50%;font-weight:900;position:absolute;top:110%;left:52%;>+</button></a>





</body>
</html>
