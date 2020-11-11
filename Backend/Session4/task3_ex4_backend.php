<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $a1 = !empty($_POST["n1"]); $a2 = !empty($_POST["n2"]); $a3 = !empty($_POST["n3"]); $a4 = !empty($_POST["n4"]); $a5 = !empty($_POST["n5"]);
    $a6 = !empty($_POST["n6"]); $a7 = !empty($_POST["n7"]); $a8 = !empty($_POST["n8"]); $a9 = !empty($_POST["n9"]); $a10 = !empty($_POST["n10"]);
    $a11 = !empty($_POST["n11"]); $a12 = !empty($_POST["n12"]); $a13 = !empty($_POST["n13"]); $a14 = !empty($_POST["n14"]); 
    $a15 = !empty($_POST["n15"]);

    $all_names = ($a1 && $a2 && $a3 && $a4 && $a5 && $a6 && $a7 && $a8 && $a9 && $a10 && $a11 && $a12 && $a13 && $a14 && $a15);

    $m1 = !empty($_POST["g1"]); $m2 = !empty($_POST["g2"]); $m3 = !empty($_POST["g3"]); $m4 = !empty($_POST["g4"]); $m5 = !empty($_POST["g5"]);
    $m6 = !empty($_POST["g6"]); $m7 = !empty($_POST["g7"]); $m8 = !empty($_POST["g8"]); $m9 = !empty($_POST["g9"]); $m10 = !empty($_POST["g10"]);
    $m11 = !empty($_POST["g11"]); $m12 = !empty($_POST["g12"]); $m13 = !empty($_POST["g13"]); $m14 = !empty($_POST["g14"]); 
    $m15 = !empty($_POST["g15"]);

    $all_ids = ($m1 && $m2 && $m3 && $m4 && $m5 && $m6 && $m7 && $m8 && $m9 && $m10 && $m11 && $m12 && $m13 && $m14 && $m15);

    # Verify that all the data has been entered correctly
    if ($all_names && $all_ids && !empty($_POST["sorting"]) && !empty($_POST["order"])) {

        #Extract the data
        $a1 = ($_POST["n1"]); $a2 = ($_POST["n2"]); $a3 = ($_POST["n3"]); $a4 = ($_POST["n4"]); $a5 = ($_POST["n5"]);
        $a6 = ($_POST["n6"]); $a7 = ($_POST["n7"]); $a8 = ($_POST["n8"]); $a9 = ($_POST["n9"]); $a10 = ($_POST["n10"]);
        $a11 = ($_POST["n11"]); $a12 = ($_POST["n12"]); $a13 = ($_POST["n13"]); $a14 = ($_POST["n14"]); $a15 = ($_POST["n15"]);
    
        $m1 = ($_POST["g1"]); $m2 = ($_POST["g2"]); $m3 = ($_POST["g3"]); $m4 = ($_POST["g4"]); $m5 = ($_POST["g5"]);
        $m6 = ($_POST["g6"]); $m7 = ($_POST["g7"]); $m8 = ($_POST["g8"]); $m9 = ($_POST["g9"]); $m10 = ($_POST["g10"]);
        $m11 = ($_POST["g11"]); $m12 = ($_POST["g12"]); $m13 = ($_POST["g13"]); $m14 = ($_POST["g14"]); $m15 = ($_POST["g15"]);

        $emp_data = [
            $m1 => $a1, $m2 => $a2, 
            $m3 => $a3, $m4 => $a4,
            $m5 => $a5, $m6 => $a6, 
            $m7 => $a7, $m8 => $a8,
            $m9 => $a9, $m10 => $a10, 
            $m11 => $a11, $m12 => $a12,
            $m13 => $a13, $m14 => $a14, 
            $m15 => $a15
        ];

        $key_array = [$m1 , $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $m13, $m14, $m15];

        if (array_has_dupes($key_array)) {
            exit("Cannot have duplicate employee IDs");
        }



        #Sort by value
        if($_POST["sorting"] == "Name"){  

            if ($_POST["order"] == "asc") {
                echo "Sort by name ascendingly <br> <br>";
                asort($emp_data);  # ascending order
            }

            else{
                echo "Sort by name descendingly <br> <br>";
                arsort($emp_data);  # descending order
            }
 
        }


        #Sort by key
        elseif ($_POST["sorting"] == "ID") {
            
            if ($_POST["order"] == "asc") {
                echo "Sort by ID ascendingly <br> <br>";
                ksort($emp_data); # ascending order
            }

            else{
                echo "Sort by ID descendingly <br> <br>";
                krsort($emp_data); # descending order
            }
        }

        foreach ($emp_data as $key => $value) {
            echo "$key : $value <br>";
        }

    }

    else{
        echo "Enter the missing  data";
    }


}


# Check for duplicate values in an array
function array_has_dupes($array) {
    return count($array) !== count(array_unique($array));
 }








