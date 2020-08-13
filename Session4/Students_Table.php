<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $a1 = !empty($_POST["n1"]); $a2 = !empty($_POST["n2"]); $a3 = !empty($_POST["n3"]); $a4 = !empty($_POST["n4"]); $a5 = !empty($_POST["n5"]);
    $a6 = !empty($_POST["n6"]); $a7 = !empty($_POST["n7"]); $a8 = !empty($_POST["n8"]); $a9 = !empty($_POST["n9"]); $a10 = !empty($_POST["n10"]);

    $all_names = ($a1 && $a2 && $a3 && $a4 && $a5 && $a6 && $a7 && $a8 && $a9 && $a10);

    $m1 = !empty($_POST["g1"]); $m2 = !empty($_POST["g2"]); $m3 = !empty($_POST["g3"]); $m4 = !empty($_POST["g4"]); $m5 = !empty($_POST["g5"]);
    $m6 = !empty($_POST["g6"]); $m7 = !empty($_POST["g7"]); $m8 = !empty($_POST["g8"]); $m9 = !empty($_POST["g9"]); $m10 = !empty($_POST["g10"]);

    $all_grades = ($m1 && $m2 && $m3 && $m4 && $m5 && $m6 && $m7 && $m8 && $m9 && $m10);


    if ($all_names && $all_grades) {

        $a1 = ($_POST["n1"]); $a2 = ($_POST["n2"]); $a3 = ($_POST["n3"]); $a4 = ($_POST["n4"]); $a5 = ($_POST["n5"]);
        $a6 = ($_POST["n6"]); $a7 = ($_POST["n7"]); $a8 = ($_POST["n8"]); $a9 = ($_POST["n9"]); $a10 = ($_POST["n10"]);
    
        $m1 = ($_POST["g1"]); $m2 = ($_POST["g2"]); $m3 = ($_POST["g3"]); $m4 = ($_POST["g4"]); $m5 = ($_POST["g5"]);
        $m6 = ($_POST["g6"]); $m7 = ($_POST["g7"]); $m8 = ($_POST["g8"]); $m9 = ($_POST["g9"]); $m10 = ($_POST["g10"]);

    
    }

    else{
        exit("Enter the missing data");
    }

}

?>


<html>
    <head>
        <style>
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
            th, td {
            padding: 15px;
            text-align: left;
        }
            #t01 {
            width: 100%;    
            background-color: #f1f1c1;
        }
        </style>
    </head>
<body>



<table style="width:70%">
  <tr>
    <th>Student</th>
    <th>Grade</th> 
  </tr>

  <tr>
    <td><?= isset($a1) ? $a1 : '' ?></td>
    <td><?= isset($m1) ? $m1 : '' ?></td>
  </tr>

  <tr>
    <td><?= isset($a2) ? $a2 : '' ?></td>
    <td><?= isset($m2) ? $m2 : '' ?></td>
  </tr>

  
  <tr>
    <td><?= isset($a3) ? $a3 : '' ?></td>
    <td><?= isset($m3) ? $m3 : '' ?></td>
  </tr>

  <tr>
    <td><?= isset($a4) ? $a4 : '' ?></td>
    <td><?= isset($m4) ? $m4 : '' ?></td>
  </tr>

  
  <tr>
    <td><?= isset($a5) ? $a5 : '' ?></td>
    <td><?= isset($m5) ? $m5 : '' ?></td>
  </tr>

  <tr>
    <td><?= isset($a6) ? $a6 : '' ?></td>
    <td><?= isset($m6) ? $m6 : '' ?></td>
  </tr>

  
  <tr>
    <td><?= isset($a7) ? $a7 : '' ?></td>
    <td><?= isset($m7) ? $m7 : '' ?></td>
  </tr>

  <tr>
    <td><?= isset($a8) ? $a8 : '' ?></td>
    <td><?= isset($m8) ? $m8 : '' ?></td>
  </tr>

  
  <tr>
    <td><?= isset($a9) ? $a9 : '' ?></td>
    <td><?= isset($m9) ? $m9 : '' ?></td>
  </tr>

  <tr>
    <td><?= isset($a10) ? $a10 : '' ?></td>
    <td><?= isset($m10) ? $m10 : '' ?></td>
  </tr>


</table>