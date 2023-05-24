<!-- Delete php -->
<?php
    if (isset($_GET["row"])) 
    {
        $id = $_GET["row"];

        $conn = mysqli_connect("localhost","root","","campuscore_temp");
        if ($conn)
        {
            $query2 = "SELECT * FROM files where id='".$id."'";
            $record = mysqli_query($conn,$query2);
            while ($row = mysqli_fetch_row($record))
            {
                $file_path = '../uploads/'.$row[1];
                if (file_exists($file_path)) {
                    if (unlink($file_path)) {
                        echo 'File deleted successfully.';
                    } else {
                        echo 'Failed to delete file.';
                    }
                } else {
                    echo 'File not found.';
                }
                
            }

            $query  = "DELETE from files where id = '".$id."'";
            mysqli_query($conn,$query);

            
            mysqli_close($conn);
            header("location: studentSubmissionFile.php");
        }
        else
        {
            echo "Erorr!";
        }
       
    }
?>