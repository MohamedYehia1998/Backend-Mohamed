<html>

    <body>  
        <form method = "POST">
            <span>Enter the number</span>
            <br><br>
            <input name = "number" value = "<?= isset($_POST["number"]) ? $_POST["number"] : " " ?>">
            <button type = "submit">Submit</button>
        </form>

    </body>


</html>


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!empty($_POST["number"]) || $_POST["number"] == "0"){

        $n = $_POST["number"];
        

        for ($i=1; $i <= 12; $i++) { 
            
            $j = $n*$i;
            echo "$n * $i = $j <br>";
            
        }

    }

}


?>