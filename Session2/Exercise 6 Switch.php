<?php

echo "Exercise 6 With Switch <br> <br>";

$grade = 90;

switch (true) {
    case $grade >= 90:
        echo "$grade -> A";
        break;

    case $grade >= 80:
        echo "$grade -> B";           
         break;
        
    case $grade >= 70:
        echo "$grade -> C";           
        break;
    
    case $grade >= 60:
        echo "$grade -> D";           
        break;       
    
    case $grade >= 50:
        echo "$grade -> E";           
        break;
        
    case $grade >= 0:
        echo "$grade -> F";           
        break;    
    
    default:
    echo "N/A";
        break;
}

$s = str_repeat("-", 30);
echo "<br> $s <br>";

###########################

echo "Exercise 6 With Switch (Alternative) <br> <br>";

$grade = 40;

$digit = intdiv($grade,10);


switch ($digit) {
    case 10:
    case 9:    
        echo "$grade -> A";
        break;  
    
    case 8:
        echo "$grade -> B";
        break;

    case 7:
        echo "$grade -> C";
        break;  

    case 6:
        echo "$grade -> D";
        break;
        
    case 5:
        echo "$grade -> E";
        break;    

    case 4:
    case 3:
    case 2:
    case 1:
    case 0:            
        echo "$grade -> F";
        break;        

    default:
        echo "N/A";
        break;
}