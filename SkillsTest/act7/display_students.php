<html>
    <header>
        <title>Display Students</title>
        <style>
            table {
                margin: 0 auto;
            }
            p {
                text-align: center;
            }
        </style>
    </header>
    <body>
        <p><a href="search_students.php">Search</a></p>
        <?php
            //database configuration
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "student";

            $con = mysqli_connect($host,$username,$password,$database);
            $query = "SELECT 
                            student.id,
                            student.lastname,
                            student.firstname,
                            course.course,
                            student.year    
                        FROM 
                            student
                        LEFT JOIN
                            course
                        ON
                            student.id = course.id";
            $records = mysqli_query($con,$query);

            if (mysqli_num_rows($records) > 0)
            {
                echo "<table border='1'>";
                echo "  <tr>";
                echo "      <th>ID</th>";
                echo "      <th>LASTNAME</th>";
                echo "      <th>FIRSTNAME</th>";
                echo "      <th>COURSE</th>";
                echo "      <th>YEAR</th>";
                echo "  </tr>";
                while ($rec = mysqli_fetch_row($records))
                {
                    echo "<tr>";
                    echo "  <td>".$rec[0]."</td>";
                    echo "  <td>".$rec[1]."</td>";
                    echo "  <td>".$rec[2]."</td>";
                    echo "  <td>".$rec[3]."</td>";
                    echo "  <td>".$rec[4]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        
            mysqli_close($con);
        ?>
        
    </body>
</html>