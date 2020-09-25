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


  .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
} 


</style>
</head>
<body style=background-color:white;>

<section id="ABC">


    <p style = font-size:65pt;color:white;position:absolute;top:30%;left:30%;font-weight:900;>No Stories Found</p> <br> 
 

    <a href="{{route('stories.create')}}">
    <button class="button" style=font-size:12pt;background-color:darkblue;color:white;position:absolute;top:170%;left:10%;font-weight:900;><span>Create your first story now! </span></button>
    </a>





</body>
</html>
