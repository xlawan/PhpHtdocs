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
        a {
            text-decoration: none;
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
                <button class="w3-button w3-indigo w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Course
                </button><br>
                <button class="w3-button w3-round-large w3-left-align">
                    <img src="../Assets/Images/LogoOnly.png" width="50">
                    Files
                </button><br>
                <button class="w3-button w3-round-large w3-left-align" onclick="location.href='repository.php'">
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
        <div class="w3-margin-top w3-margin-left w3-text-indigo">
            <a href="courseList.php">< back</a>
        </div>
        <!-- Courses title -->
        <div class="w3-container">
            <div style="padding: 0;" class="w3-panel w3-white w3-card w3-round-large">
                <span class="w3-padding-large w3-xxlarge">RESCOM 31</span>
                <br>
                <span class="w3-padding-large">99921 | 1:30 - 3:30 PM | MONDAY - WEDNESDAY</span>
                <div class="w3-panel w3-indigo">
                    <img class="w3-right" src="../Assets/Images/LogoOnly.png" width="70">
                    <span class="w3-right w3-medium">Benjamin Ryan Newman</span>
                    <br>
                    <span class="w3-right w3-small">UCMN - CCS Professor</span>
                </div>
                <div class="w3-white w3-margin-left">
                    <div class="w3-medium">Course Description</div>
                    <div class="w3-small">
                        Course Description Course Description Course Description Course Description
                        Course Description Course Description Course Description Course Description
                        Course Description Course Description Course Description Course Description
                    </div>
                    <br>
                </div>
            </div>

            <!-- Courses List -->
            <div class="w3-container w3-card">
                <div class="w3-margin">
                    <div id="profName" class="w3-panel">
                    <?php
                            $conn = mysqli_connect("localhost","root","","campuscore_temp");
                            if ($conn)
                            {
                                $query = "SELECT * FROM files";

                                $record = mysqli_query($conn,$query);
                                if (mysqli_num_rows($record)>0)
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

                                    while ($rec = mysqli_fetch_row($record))
                                    {
                                        echo "<tr>";
                                        echo "  <td>".$rec[0]."</td>";
                                        echo "  <td>".$rec[1]."</td>";
                                        echo "  <td>".$rec[2]."</td>";
                                        echo "  <td>".$rec[3]."</td>";
                                        echo "  <td>".$rec[4]."</td>";
                                        echo "  <td></td>";
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
                    <br>
                    <button class="w3-button w3-round-large w3-right w3-indigo" onclick="location.href='studentSubmissionFile.php'">Add New Submission</button>
                    <br><br>
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
</html>