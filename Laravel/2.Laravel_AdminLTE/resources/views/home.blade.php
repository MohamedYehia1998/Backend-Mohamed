<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @include('layouts.common.css_links')

  <title>Mohamed For The Win</title>    
</head>

<body onload="myFunction()" style="margin:0;" class="hold-transition sidebar-mini" >

<div id="loader"></div>

<div id="myDiv" style=display:none; class="wrapper">
      @include('dashboard_variants.noselection')
</div>







</body>

@include('layouts.common.js_myfunction') 

@include('layouts.common.js_links')

</html>
