<?php
    if (isset($_GET["row"])) 
    {
        $id = $_GET["row"];

        $con = mysqli_connect("localhost","root","","book");
        if ($con)
        {
            $query  = "DELETE from books where isbn = '".$id."'";
            mysqli_query($con,$query);
            header("location: search.php?message=deleted successfully");
        }
        else
        {
            echo "Erorr!";
        }
        mysqli_close($con);
    }
?>