<?php
    if (isset($_GET["compute"]) == true){
        $var1 = 0;
        $var2 = 0;
        $var3 = 0;

        $var1 = $_GET["num1"];
        $var2 = $_GET["num2"];
        $var3 = $_GET["operation"];

        switch ($var3) {
            case "addition":
                echo $var1 . " + " . $var2 . " = " . $var1 + $var2;
                break;
            case "subtraction":
                echo $var1 . " - " . $var2 . " = " . $var1 - $var2;
                break;
            case "multiplication":
                echo $var1 . " * " . $var2 . " = " . $var1 * $var2;
                break;
            case "division":
                echo $var1 . " / " . $var2 . " = " . $var1 / $var2;
                break;
        }
        echo "<br><br><a href='input.php'>Go Back</a>";
    }
?>