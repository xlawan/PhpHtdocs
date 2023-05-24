<body>
    <h1>PHP ACTIVITY 5</h1>
    <form action="input.php" method="POST">
        Input: <input type="text" name="text" /><br />
        <input type="submit" name="submit" /><br />
    </form>
    <?php
        if (isset($_POST["submit"]))
        {
            $str;
            $vowels = 0;
            $consonants = 0;
            $spaces = 0;

            $str=$_POST["text"];
            $str = strtolower($str);

            for ($i = 0; $i < strlen($str); $i++)
            {
                if ($str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || $str[$i] == 'o' || $str[$i] == 'u') 
                {
                    $vowels++;
                }
                else if ($str[$i] >= 'a' && $str[$i] <= 'z')
                {
                    $consonants++;
                }
                else if ($str[$i] == " ")
                {
                    $spaces++;
                }
            }
            echo "Inputted Text: " . $str . "<br />";
            echo "No of vowels: " . $vowels . "<br />";
            echo "No of consonants: " . $consonants . "<br />";
            echo "No of spaces: " . $spaces . "<br />";
        }

    ?>
</body>
