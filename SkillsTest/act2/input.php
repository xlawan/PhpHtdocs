<!DOCTYPE html>
<html>
    <head>
        <title>Act 2</title>
    </head>
    <body>
        <h1>PHP Activity 2</h1>
        <form action="compute.php" method="GET">
            Enter 1st no: <input type="number" name="num1" />
            <br />
            Enter 2nd no: <input type="number" name="num2" />
            <br />
            Select Operation: <br />
            <input type="radio" name="operation" value="addition" /> + <br />
            <input type="radio" name="operation" value="subtraction" /> - <br />
            <input type="radio" name="operation" value="multiplication" /> * <br />
            <input type="radio" name="operation" value="division" /> / <br />

            <input type="submit" name="compute" value="compute" />
        </form>
    </body>
</html>