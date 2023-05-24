<!DOCTYPE html>
<html lang="en">
<head>
  <title>CampusCore Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    .w3-opacity::placeholder {
      color: black;
    }
    input {
      background-color: #D9D9D9;
    }
    a {
      text-decoration: none;
    }
  </style>
</head>
<body>
  
<div class="w3-row w3-padding w3-margin-top">
  <!-- Left Container (Logo) -->
  <div class="w3-half w3-container w3-center"> 
    <img src="../Assets/Images/Logo.png" width="900" alt="App Logo">
  </div>

  <!-- Right Container (Login) -->
  <div class="w3-half w3-container w3-card w3-round-large w3-padding-64 w3-padding-large">
    <form action="index.php" method="POST" style="width: 70%; margin: auto; padding: auto;" class="w3-container w3-padding-large">
      <h1 style="font-weight: bold;">Sign In</h1>
      <h3>Sign in to your account</h3>
      
      
      <div class="w3-card w3-padding-small w3-padding-16 w3-round-large">
        <label class="w3-text">Email Address</label>
        <input name="username" class="w3-input w3-border w3-round-large w3-card" type="text" placeholder="Enter your Email Address">
        <br>
        <label class="w3-text">Password</label>
        <input name="password" class="w3-input w3-border w3-round-large w3-card" type="password" placeholder="Enter your password">
        <br>
        

        <button name="submit" type="submit" style="background-color: #0C023E; color:#ffffff; font-weight: bold;" class="w3-button w3-block w3-margin-top w3-center w3-round-large">Log In</button>  
        <br>
        <a class="w3-right w3-text-blue" href="#">Forgot your password?</a>
        <br>
        <p class="w3-center w3-padding-32">Don't have an account? <a class="w3-text-blue" href="userRegistration.php">Register now</a></p>
        
      </div>
      </form>
  </div>
</div>
<!-- footer -->
<div style="background-color:#0C023E!important" class="w3-container w3-text-yellow w3-bottom">
  <div class="w3-center">
    Copyright © 2023 CampusCore Website. All rights reserved. <br />
      <a href="#">Terms of use</a> | <a href="#">Privacy Policy</a>
  </div>
</div>

</body>
<?php
  if (isset($_POST["submit"]))
  {
    // Database connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campuscore_temp";

    // Create a new MySQLi connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Login process
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Prepare and execute an SQL statement to retrieve the user from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists and verify the password
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["password"];
            $salt = $row["salt"];
            $hashedInputPassword = hash('sha256', $password . $salt);

            if ($hashedInputPassword === $hashedPassword) {
                // Redirect based on user type
                $userType = $row["userType"];
                switch ($userType) {
                    case "admin":
                        header("Location: course.php");
                        break;
                    case "dean":
                        header("Location: deanFileApproval.php");
                        break;
                    case "student":
                        header("Location: studentSubmission.php");
                        break;
                    // Add more cases for other user types as needed
                    default:
                        echo "Invalid user type.";
                }
                exit(); // Terminate the script after redirection
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }

        // Close the statement and result set
        $stmt->close();
        $result->free_result();
    }

    // Close the database connection
    $conn->close();
  }
?>

</html>
