<?php
    if (isset($_POST["add"]))
    {
        $lastname = $_POST["lastname"];
        $firstname = $_POST["firstname"];
        $course = $_POST["course"];
        $year = $_POST["year"];

        $con = mysqli_connect("localhost","root","","student");
        if ($con)
        {
            $query = "INSERT INTO 
                            student (lastname,firstname,course,year)
                        VALUES
                            ('".$lastname."','".$firstname."','".$course."','".$year."')";
            mysqli_query($con,$query);
            header("location: search_students.php?message=Added Successfully!");
        }
        else 
        {
            echo "Database Errror!";
        }
        mysqli_close($con);
    }
?>
<body>
    <form action="add_students.php" method="POST">
        Lastname: <input type="text" name="lastname" /><br />
        Firstname: <input type="text" name="firstname" /><br />
        Course: <input type="number" name="course" /><br />
        Year: <input type="number" name="year" /><br /><br />
        <input type="submit" name="add" value="ADD Student" /><br />
    </form>
    <button onclick="window.location.href='search_students.php?message=Added successfully!'">Go Back to Search</button>
</body>