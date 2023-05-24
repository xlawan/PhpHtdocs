<?php
    if (isset($_POST["compute"]))
    {
        $num1=0;
        $num2=0;
        $oper=0;

        $num1=$_POST["num1"];
        $num2=$_POST["num2"];
        $oper=$_POST["operation"];

        for ($i = 0; $i < count($oper); $i++) 
        {
            switch($oper[$i])
            {
                case "addition":
                    echo $num1 . " + " . $num2 . " = " . $num1 + $num2 . "<br />";
                    break;
                case "subtraction":
                    echo $num1 . " - " . $num2 . " = " . $num1 - $num2 . "<br />";
                    break;
                case "multiplication":
                    echo $num1 . " * " . $num2 . " = " . $num1 * $num2 . "<br />";
                    break;
                case "division":
                    echo $num1 . " / " . $num2 . " = " . $num1 / $num2 . "<br />";
                    break;
            }
        }
    }
    echo "<br><br><a href='input.php'>GO BACK</a>"
?>