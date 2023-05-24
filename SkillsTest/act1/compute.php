<html>
    <head>
        <title>Act 1 Compute</title>
    </head>
    <body>
        <?php
            // declare variables
            $num1 = 0;
            $num2 = 0;
            $oper = 0;

            if (isset($_GET["compute"]) == true){
                $num1 = $_GET["firstNum"];
                $num2 = $_GET["secondNum"];
                $oper = $_GET["operation"];

                switch ($oper) {
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
        ?>

        <a href="input.php">Go Back</a>
    </body>
</html>