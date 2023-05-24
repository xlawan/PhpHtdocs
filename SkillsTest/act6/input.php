<body>
    <h1>PHP ACTIVITY 6</h1>
    <form action="input.php" method="POST">
        Input: <textarea name="text"></textarea> <br />
        <input type="submit" name="submit" />    
    </form>

    <?php
        if (isset($_POST["submit"]))
        {
            $var1;

            $var1 = $_POST["text"];
            echo "<textarea readonly>" . $var1 ."</textarea>";
        }
    
    ?>
</body>