<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        #navButtons button {
            width: 80%;
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Left Container Navigation bar -->
    <div class="w3-container w3-card w3-row w3-padding-small">
        <div class="w3-half">
            <img class="w3-left" width="100" src="../Assets/Images/LogoOnly.png"><br>
            <h5>A Secure Digital Repository as Knowledge Management System</h5>    
        </div>
        <div class="w3-half">
            <img class="w3-right w3-round" width="100" src="../Assets/Images/LogoOnly.png" onclick="location.href='index.php'">
            <p class="w3-right">Hi, Juan Dela Cruz</p>
        </div>
    </div>
    <!-- body of the document -->
    <!-- Left navigation bars -->
    <div class="w3-quarter">
        <div class="w3-container w3-padding-large w3-center">
            <div id="navButtons" class="w3-card w3-margin-left w3-margin-right w3-round-large">
                <button class="w3-button w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Home
                </button><br>
                <button class="w3-button w3-round-large w3-left-align" onclick="location.href='course.php'">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Course
                </button><br>
                <button class="w3-button w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Files
                </button><br>
                <button class="w3-button w3-indigo w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Repository
                </button><br>
                <button class="w3-button w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Timetable
                </button><br>
                <button class="w3-button w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Issues
                </button><br>
                <button class="w3-button w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Settings
                </button><br>
                <br><br><br><br><br><br><br>
                <button class="w3-button w3-round-large w3-left-align" onclick="location.href='index.php'">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Logout
                </button><br>
            </div>
        </div>
    </div>

    <!-- Main Container Body -->
    <div class="w3-half">
        <!-- Courses title -->
        <div class="w3-container">
            <div style="padding: 0;" class="w3-panel w3-indigo w3-card w3-round-large">
                <h1 class="w3-padding-large">RESEARCH REPOSITORY</h1>
            </div>
            <!-- Courses List -->
            <div class="w3-container w3-card">
                <div class="w3-margin">
                    <div id="searchbar" class="w3-panel">
                        <form method="GET" action="#">
                            <input type="submit" name="submit" class="w3-button w3-indigo w3-right w3-round-large" />
                            <input type="text" name="search" placeholder="Search here..." style="width: 30%" class="w3-input w3-right w3-border" />
                        </form>
                    </div>
                    <div id="files" style="max-height: 80%; overflow: auto;" class="w3-card w3-margin-left">
                        <?php
                            $conn = mysqli_connect("localhost","root","","campuscore_temp");
                            if ($conn)
                            {
                                $query = "SELECT * FROM files";

                                $record = mysqli_query($conn,$query);
                                if (mysqli_num_rows($record)>0)
                                {
                                    echo "<table class='w3-table-all'>";
                                    echo "  <tr style='position: sticky; top: 0;'>";
                                    echo "  <th>ID</th>";
                                    echo "  <th>FILENAME</th>";
                                    echo "  <th>STATUS</th>";
                                    echo "  <th>VERSION</th>";
                                    echo "  <th>DATE & TIME</th>";
                                    echo "  <th>ACTION</th>";
                                    echo "  </tr>";

                                    while ($rec = mysqli_fetch_row($record))
                                    {
                                        echo "<tr>";
                                        echo "  <td>".$rec[0]."</td>";
                                        echo "  <td>".$rec[1]."</td>";
                                        echo "  <td>".$rec[2]."</td>";
                                        echo "  <td>".$rec[3]."</td>";
                                        echo "  <td>".$rec[4]."</td>";
                                        echo "  <td class='w3-row'><a class='w3-button w3-small w3-pink w3-round-xlarge w3-half' href='repository.php?row=$rec[0]'>&#128465;</a>
                                                <a class='w3-button w3-small w3-green w3-round-xlarge w3-half' href='studentShowPdf.php?rec=$rec[0]'>&#128269;</a></td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                else
                                {
                                    echo "<table class='w3-table-all'>";
                                    echo "  <tr>";
                                    echo "  <th>ID</th>";
                                    echo "  <th>FILENAME</th>";
                                    echo "  <th>STATUS</th>";
                                    echo "  <th>VERSION</th>";
                                    echo "  <th>DATE</th>";
                                    echo "  <th>ACTION</th>";
                                    echo "  </tr>";
                                    echo "  </table>";
                                    echo "<div class='w3-red w3-large w3-container'>No data to show</div>";
                                }
                            }
                            else
                            {
                                echo "<div class='w3-panel w3-red'>Failed to connect to Database</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Container Status -->
    <div class="w3-quarter">
        <!-- Completion Status -->
        <div class="w3-container">
            <div id="completionStatus" class="w3-card w3-margin-top">
                <h4 style="font-weight: bold;" class="w3-panel w3-indigo w3-round-small w3-block w3-padding">COMPLETION STATUS</h4>
                <div class="w3-container">
                    <div class="w3-green w3-border-green w3-topbar w3-bottombar"><br></div>
                    <span>RESCOM 31 | 99921</span>
                </div>
                <div class="w3-container">
                    <div style="width: 50%;" class="w3-green w3-border-green w3-topbar w3-bottombar"><br></div>
                    <span>TESTQUA 31 | 44921</span>
                </div>
                <div class="w3-container">
                    <div style="width: 20%;" class="w3-green w3-border-green w3-topbar w3-bottombar"><br></div>
                    <span>HCI 31 | 99991</span>
                </div>
                <br><br>
            </div> 
        </div>
        <br><br>
        <div class="w3-container">
            <div id="deadlines" class="w3-card w3-margin-top">
                <h4 style="font-weight: bold;" class="w3-panel w3-red w3-round-small w3-block w3-padding w3-text-bold">DEADLINES</h4>
                <div class="w3-container w3-card w3-margin-bottom">
                    <h4>FEBRUARY 16, 2023 | 11:30 PM THURSDAY <br> CHAPTER I | MANUSCRIPT</h4>
                    <span>RESCOM 31 | 99921 | 9:30 - 10:30 AM | FRIDAY - SATURDAY</span>
                </div>
                <div class="w3-container w3-card w3-margin-bottom">
                    <h4>FEBRUARY 16, 2023 | 11:30 PM THURSDAY <br> CHAPTER I | MANUSCRIPT</h4>
                    <span>RESCOM 31 | 99921 | 9:30 - 10:30 AM | FRIDAY - SATURDAY</span>
                </div>
                <div class="w3-container w3-card w3-margin-bottom">
                    <h4>FEBRUARY 16, 2023 | 11:30 PM THURSDAY <br> CHAPTER I | MANUSCRIPT</h4>
                    <span>RESCOM 31 | 99921 | 9:30 - 10:30 AM | FRIDAY - SATURDAY</span>
                </div>
            </div>
        </div>
    </div>
</body>
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
            header("location: repository.php");
        }
        else
        {
            echo "Erorr!";
        }
       
    }
?>
</html>