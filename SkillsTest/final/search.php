<body>
    <h2>Search</h2>
    <form action="search.php" method="GET">
        <input type="text" name="keyword" placeholder="Input keyword here..." >
        <input type="submit" name="search" value="search"> <br />
    </form>
    <button onclick="window.location.href='add.php'">ADD</button>
    <?php
        if (isset($_GET["search"]))
        {
            $keyword = trim($_GET["keyword"]);

            $con = mysqli_connect("localhost","root","","book");

            if($con)
            {
                $query = "SELECT
                                *
                            FROM
                                books
                            WHERE 
                                title like '%".$keyword."%' 
                                or copywrite like '%".$keyword."%'";
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
                    echo "  <th>Delete</th>";
                    echo "  <th>Update</th>";
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
                        echo "  <td><a href='delete.php?row=$rec[0]'>Delete</a></td>";
                        echo "  <td><a href='update.php?rec0=$rec[0]&rec1=$rec[1]&rec2=$rec[2]&rec3=$rec[3]&rec4=$rec[4]&rec5=$rec[5]'>Update</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            else
            {
                echo "DB Connection Error";
            }
            mysqli_close($con);
        }
        include "delete.php";
    ?>
</body>