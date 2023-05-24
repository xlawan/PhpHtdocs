<html>
    <header>
        <title>SkillsTest</title>
    </header>
    <body>
        <h1>LIST ALL</h1>
        <button onclick="window.location.href='search.php'">Search</button>
        <?php
            $con = mysqli_connect("localhost","root","","book");

            if ($con)
            {
                $query = "SELECT * FROM books";
                $record = mysqli_query($con,$query);
                if (mysqli_num_rows($record)>0)
                {
                    echo "<table border='1'>";
                    echo "  <tr>";
                    echo "  <th>ISBN</th>";
                    echo "  <th>TITLE</th>";
                    echo "  <th>COPYWRITE</th>";
                    echo "  <th>EDITION</th>";
                    echo "  <th>PRICE</th>";
                    echo "  <th>QUANTITY</th>";
                    echo "  </tr>";

                    while ($rec = mysqli_fetch_row($record))
                    {
                        echo "<tr>";
                        echo "  <td>".$rec[0]."</td>";
                        echo "  <td>".$rec[1]."</td>";
                        echo "  <td>".$rec[2]."</td>";
                        echo "  <td>".$rec[3]."</td>";
                        echo "  <td>".$rec[4]."</td>";
                        echo "  <td>".$rec[5]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            else
            {
                echo "database error!";
            }
            mysqli_close($con);
        ?>
    </body>
</html>