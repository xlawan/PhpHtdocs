<?php
    // Check if the form is submitted
    if (isset($_POST["fileSubmit"])) {
        // Define the target directory where the uploaded file will be saved
        $targetDir = '../uploads/';

        // Get the file name
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileSize = $_FILES['file']['size'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExt = array("pdf");

        if(in_array($fileExt, $allowedExt)){
            if($fileError === 0){
                $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
                date_default_timezone_set('Asia/Manila'); // set timezone to Philippines
                $time = date('m-d-Y-H-i-s', time());
                $newFileName = $fileBaseName . '_' . $time . '.' . $fileExt;
                $uploadPath = $targetDir . $newFileName;
                if(move_uploaded_file($fileTmp, $uploadPath)){
                    // File upload was successful
                    // Insert the file name into the database
                    $conn = mysqli_connect("localhost", "root", "", "campuscore_temp");
                    $sql = "INSERT INTO files (filename,dateUploaded) VALUES ('$newFileName','$time')";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    echo "<div class='w3-center w3-padding-small w3-panel w3-green'>The file " . $newFileName . " has been uploaded.</div>";
                    }
            } else {
                echo '<div class="w3-center w3-padding-small w3-panel w3-red">Error uploading file.';
            }
        } else {
            echo '<div class="w3-center w3-padding-small w3-panel w3-red">Invalid file type.</div>';
        }
    }
?>