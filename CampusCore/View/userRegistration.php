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
    <form action="userRegistration.php" method="POST" style="width: 70%; margin: auto; padding: auto;" class="w3-container w3-padding-large">
      <h1 style="font-weight: bold;">Create an account</h1>
      <h3>Create an account to use dashboard</h3>
      
      
      <div class="w3-card w3-padding-small w3-padding-16 w3-round-large">
        <label class="w3-text">Email Address</label>
        <input name="username" class="w3-input w3-border w3-round-large w3-card" type="text" placeholder="Enter your Email Address">
        <br>
        <label class="w3-text">Password</label>
        <input name="password" class="w3-input w3-border w3-round-large w3-card" type="password" placeholder="Enter your password">
        <br>
        <label class="w3-text">User Type:</label>
        <select name="usertype">
          <option value=""></option>
          <option value="admin">Admin</option>
          <option value="dean">Dean</option>
          <option value="student">Student</option>
        </select>
        <br>
        

        <button name="signUp" type="submit" style="background-color: #0C023E; color:#ffffff; font-weight: bold;" class="w3-button w3-block w3-margin-top w3-center w3-round-large">Sign up</button>  
      </div>
      <br>
      <div class="w3-center">
        Already have an account? <a href="index.php" class="w3-text-blue">Sign in here</a>
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
  if (isset($_POST["signUp"]))
  {
    // Function to generate a random salt
    function generateSalt($length = 16) 
    {
      return bin2hex(random_bytes($length));
    }

    // Function to hash the password with salt
    function hashPassword($password, $salt) 
    {
      return hash('sha256', $password . $salt);
    }

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

    // Registration process
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userType = $_POST["usertype"];

        // Generate a salt
        $salt = generateSalt();

        // Hash the password with the salt
        $hashedPassword = hashPassword($password, $salt);

        // Prepare and execute an SQL statement to insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, password, salt, userType) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $hashedPassword, $salt, $userType);
        $stmt->execute();

        // Display success message or redirect to a different page
        if ($stmt->affected_rows === 1) {
          echo "User registered successfully!";
          // Redirect to a different page or perform additional actions
        } else {
            echo "Error in user registration.";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
  }
?>

</html>
