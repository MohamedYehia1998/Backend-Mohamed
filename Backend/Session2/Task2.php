<?php

echo "Exercise 1 <br> <br>";

$user = "Mohamed";

echo "Hi $user";

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

echo "Exercise 2 <br> <br>";

$user2 = "James";

if($user2 == "Alice" || $user2 == "Bob"){
    echo "Hi $user2";
}

else{
    echo "Incorrect user name";
}

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

echo "Exercise 3 <br> <br>";

$s1 = "f34g";
$s2 = "ghnaw2";

$l1 = strlen($s1);
$l2 = strlen($s2);

echo "Length of $s1 = $l1 <br>";
echo "Length of $s2 = $l2 <br><br>";

if($l1 > $l2){
    echo "so length of $s1 >  length of $s2 ";
}

else if($l1 < $l2){
    echo "so length of $s2 >  length of $s1 ";
}

else{
    echo "so length of $s1 =  length of $s2 ";
}

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

echo "Exercise 4 <br> <br>";

$ID = "1234";
$money_per_hour = 10;
$hours_spent = 200;
$month = "April";
$salary = $money_per_hour * $hours_spent;

echo "Employee ID: $ID <br>";
echo "Salary in $month: $salary";

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

echo "Exercise 5 <br> <br>";

$x = 5;   #cat A
$z = 3;   #mouse
$y = 1;   #cat B


echo "Cat A position = $x <br>";
echo "Mouse position = $z <br>";
echo "Cat B position = $y <br><br>";


$d_a = abs($x - $z);
$d_b = abs($y - $z);

if($d_a == $d_b){
    echo "Cat A and Cat B will fight and the Mouse will escape";
}

else if($d_a > $d_b){
    echo "Cat B will catch the mouse before Cat A";
}

else{
    echo "Cat A will catch the mouse before Cat B";
}

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

echo "Exercise 6 <br> <br>";

$firstPackage_name = "the modern package";
$firstPackage_price = 120;
$secondPackage_name= "the economic package";
$secondPackage_price = 120;
$budget = 40;

$most_expensive_price = max($firstPackage_price, $secondPackage_price);

$afford_1st = $budget >= $firstPackage_price;
$afford_2nd = $budget >= $secondPackage_price;

$most_expensive_package = find_most_expensive_package($firstPackage_price, $firstPackage_name, $secondPackage_price, $secondPackage_name);



if($afford_1st && $afford_2nd){

    if($firstPackage_price != $secondPackage_price){
        echo "You can buy any of the collections but we recommend $most_expensive_package";
    }

    else{
        echo "$firstPackage_name is of the same price as $secondPackage_name, so you can buy either.";
    }
}

else if($afford_1st && !$afford_2nd){
    echo "The suitable collection for your budget is $firstPackage_name which costs $firstPackage_price$";

}

else if(!$afford_1st && $afford_2nd){
    echo "The suitable collection for your budget is $secondPackage_name which costs $secondPackage_price$";
}

else{
    echo "Sorry, your budget is not enough";
}

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

# Supplemental Functions:

function find_most_expensive_package($firstPackage_price, $firstPackage_name, $secondPackage_price, $secondPackage_name) {

    $most_expensive_price = max($firstPackage_price, $secondPackage_price);

    if($most_expensive_price == $firstPackage_price){
        return "$firstPackage_name";
    }

    else{
        return "$secondPackage_name";
    }

  }