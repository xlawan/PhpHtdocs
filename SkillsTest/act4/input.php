<html>
    <head>
        <title>Act 4</title>
    </head>
    <body>
        <h1>PHP Activity 4</h1>
        <form action="compute.php" method="POST">
            Enter 1st no: <input type="number" name="num1" /><br />
            Enter 2nd no: <input type="number" name="num2" /><br />
            Choose Operation: <br>
            <input type="checkbox" name="operation[]" value="addition" />Addition<br />
            <input type="checkbox" name="operation[]" value="subtraction" />Subtraction<br />
            <input type="checkbox" name="operation[]" value="multiplication" />Multiplication<br />
            <input type="checkbox" name="operation[]" value="division" />Division<br />
            <br />
            <input type="submit" value="compute" name="compute" /> 
        </form>
    </body>
</html>