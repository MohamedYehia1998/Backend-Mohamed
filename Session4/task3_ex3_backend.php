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

        $student_array = [

            [$a1, $m1],
            [$a2, $m2],
            [$a3, $m3],
            [$a4, $m4],
            [$a5, $m5],
            [$a6, $m6],
            [$a7, $m7],
            [$a8, $m8],
            [$a9, $m9],
            [$a10, $m10]

        ];

        $nobody = TRUE;
        $moreThan50 = [];

        for ($i=0; $i < count($student_array); $i++) { 
            
            if($student_array[$i][1] > 50){

                $name = $student_array[$i][0];
                $grade = $student_array[$i][1];
                array_push($moreThan50, [$name, $grade]);
                $nobody = FALSE;
                
                echo "Student: $name <br>";
                echo "Degree: $grade <br>";
                echo "<br><br>";

            }
        }

        if($nobody){
            exit("No student has a degree more than 50");
        }
    
    }

    else{
        echo "Enter the missing data";
    }

}



?>




<table> 
<thead>
	<tr>
	 <th>Student</th>
	 <th>Grade</th>
	</tr>
</thead>

<tbody>
       <tr>
	 <?php foreach ($moreThan50 as $x){ ?>
	 <td> <?php echo $x[0]; ?> </td>
	 <td> <?php echo $x[1]; ?> </td>
      </tr>
	<?php } ?>
</tbody>
</table>