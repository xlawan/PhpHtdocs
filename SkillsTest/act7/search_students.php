<html>
    <head>
        <title>Search Students</title>
    </head>
    <?php 
        if (isset($_GET['message']))
        {
            $message = $_GET["message"];
            echo "<h1>".$message."</h1>";
        }
    ?>
    <h1>Search Students</h1>
    <button onclick="window.location.href='add_students.php'">ADD STUDENT</button>
    <form action="search_students.php" method="GET">
        <input type="text" name="keyword" placeholder="Type the keyword here..." />
        <input type="submit" name="search" value="search" /><br />
    </form>
    <?php
        // database configurations
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "student";

        if (isset($_GET["search"])) 
        {
            // get the keyword from form
            $keyword = trim($_GET["keyword"]);
            // establish a connection
            $con = mysqli_connect($host,$username,$password,$database);
            //
            if ($con) 
            {
                $seq = 1;
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
                                student.id = course.id
                            WHERE 
                                student.lastname like '%".$keyword."%' 
                                or student.firstname like '%".$keyword."%'
                                or course.course like '%".$keyword."%'
                                or student.year like '%".$keyword."%'";
                $records = mysqli_query($con,$query);
                if (mysqli_num_rows($records) > 0)
                {
                    // form the table
                    echo "<form action='search_students.php' method='POST'>";
                    echo "  <table border='1'>";
                    echo "      <tr>";
                    echo "          <th>NO</th>";
                    echo "          <th>ID</th>";
                    echo "          <th>LASTNAME</th>";
                    echo "          <th>FIRSTNAME</th>";
                    echo "          <th>COURSE</th>";
                    echo "          <th>YEAR</th>";
                    echo "          <th>Delete</th>";
                    echo "          <th>Single Delete</th>";
                    echo "          <th>Update</th>";
                    echo "      </tr>";

                    // loop records by records
                    while ($rec = mysqli_fetch_row($records))
                    {
                        echo "  <tr>";
                        echo "      <td>".$seq."</td>";
                        echo "      <td>".$rec[0]."</td>";
                        echo "      <td>".$rec[1]."</td>";
                        echo "      <td>".$rec[2]."</td>";
                        echo "      <td>".$rec[3]."</td>";
                        echo "      <td>".$rec[4]."</td>";
                        echo "      <td><input type='checkbox' name='id[]' value='".$rec[0]."' /></td>";
                        echo "      <td><a href='search_students.php?row=$rec[0]'>Delete</a></td>";
                        echo "      <td><a href='update.php?rec0=$rec[0]&rec1=$rec[1]&rec2=$rec[2]&rec3=$rec[3]&rec4=$rec[4]'>Update</a></td>";
                        echo "  </tr>";
                        $seq++; // increment sequence number
                    }

                    echo "  </table>";
                    echo "</form>";
                }
                else 
                {
                    // no records retrieved
                    echo "<p>No Records Retrieved</p>";
                }
            }
            else
            {
                echo "Database connection Error!";
            }
            mysqli_close($con);
        }
        include "delete_student.php";
    ?>
    
</html>