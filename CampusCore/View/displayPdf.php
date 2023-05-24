<?php
    $conn = mysqli_connect("localhost","root","","campuscore_temp");

    if ($conn)
    {
        $rec = $_GET["rec"];
        $query = "SELECT * FROM files where id='".$rec."'";
        $record = mysqli_query($conn,$query);
        if (mysqli_num_rows($record)>0)
        {
            while ($row = mysqli_fetch_row($record))
            {
                echo $row[1];
            }
        }
        else
        {
            echo "No records found";
        }
    }
    else
    {
        echo "erro connecting to database";
    }
    mysqli_close($conn);
    

    
?>