<?php
	session_start();

	//if user is not yet logged in
	if(! isset($_SESSION["username"]))
	{
		header("location: http://localhost/session/login/login.php");
		exit;
	}

	//1. empty the session array variable
	$_SESSION = array();
	
	//2. destroy the session array variable
	session_destroy();

	//3. unset all session array variable
	unset($_SESSION);
?>
<html>
	<head>
		<title>Home</title>
	</head>
	<body>
		<p>You have been successfully logged out...</p>
		<hr />
		<a href="login.php">Click here to login again</a>
	</body>
</html>