<?php
    if (isset($_GET["rec0"]))
    {
        $id = $_GET["rec0"];
        $lastname = $_GET["rec1"];
        $firstname = $_GET["rec2"];
        $course = $_GET["rec3"];
        $year = $_GET["rec4"];
    }

    if (isset($_GET["update"]))
    {
        $id = $_GET["id"];
        $lastname = $_GET["lastname"];
        $firstname = $_GET["firstname"];
        $course = $_GET["course"];
        $year = $_GET["year"];

        $con = mysqli_connect("localhost","root","","student");
        if ($con)
        {
            $query = "UPDATE 
                        student 
                    SET
                        lastname = '".$lastname."',
                        firstname= '".$firstname."',
                        course= '".$course."',
                        year= '".$year."'
                    WHERE
                        id = '".$id."'";
            mysqli_query($con,$query);
            header("location: search_students.php?message=Data successfully updated!");
        }
        else
        {
            echo "Database error!";
        }
    }
?>

<body>
    <form action="update.php" method="GET">
        ID: <input type="number" name="id" value="<?php echo $id?>" readonly /><br />
        Lastname: <input type="text" name="lastname" value="<?php echo $lastname?>" /><br />
        Firstname: <input type="text" name="firstname" value="<?php echo $firstname?>" /><br />
        Course: <input type="text" name="course" value="<?php echo $course?>" /><br />
        Year: <input type="number" name="year" value="<?php echo $year?>" /><br />
        <br />
        <input type="submit" name="update" value="update" />
    </form>

    <button onclick="window.location.href='search_students.php'">Go Back</button>
</body>

