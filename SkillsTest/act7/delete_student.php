<?php
    if (isset($_GET["row"]))
    {
        $con = mysqli_connect("localhost","root","","student");
        if ($con)
        {
            $row = $_GET["row"];
            $query = "DELETE FROM student where id = '".$row."'";
            mysqli_query($con,$query);
        }
        else
        {
            header("location: search_students.php?message=Database connection error!");    
        }
        mysqli_close($con);
        header("location: search_students.php?message=Deleted Succesfully");
    }
?>