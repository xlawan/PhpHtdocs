<html>
    <head>
        <title>Act 1</title>
    </head>
    <body>
        <h1>PHP Activity 1</h1>
        <form action="compute.php" method="GET">
            Enter 1st no: <input type="number" name="firstNum" id="firstNum" /> <br />
            Enter 2nd no: <input type="number" name="secondNum" id="secondNum" /> <br />
            Select Operation: 
            <select name="operation">
                <option value="addition">+</option>
                <option value="subtraction">-</option>
                <option value="multiplication">*</option>
                <option value="division">/</option>
            </select>
            <br>
            <input type="submit" name="compute" /> <br />
        </form>
    </body>
</html>