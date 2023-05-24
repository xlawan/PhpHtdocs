<?php
	session_start();

	//if user is already logged in
	if(isset($_SESSION["username"]))
	{
		header("location: http://localhost/session/display/list_all.php");
		exit;
	}	

	if(isset($_POST["login"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];

		$con = mysqli_connect("localhost", "root", "", "login");
		if($con)
		{

			//query the account
			$result = mysqli_query($con, "select * from user where username = '".$username."' and password='".md5($password)."' ");

			if(mysqli_num_rows($result) > 0)
			{

				while($row = mysqli_fetch_array($result))
				{
					$_SESSION["username"] = $row["username"];
					//redirect to home.php
					header("location: http://localhost/session/display/list_all.php");				
					exit;					
				}				
			}
			else 
			{
				echo "<p>Username or password was invalid.</p>";
			}
		}
		else 
		{
			echo "<p>Error connecting to the database...</p>";

		}

	}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form method="POST" action="login.php">
			<p>Username:</p>
			<input type="text" name="username" required /> <br />
			<p>Password:</p>
			<input type="password" name="password" required /> <br />
			<br />
			<input type="submit" name="login" value="Login" />

		</form>
	</body>
</html>