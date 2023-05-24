<html>
	<head>
		<title>PHP Act 1</title>
	</head>
	<body>
		<h1>PHP ACTIVITY 1</h1>
		<form action="compute.php" method="GET">
			<!--1st number here-->
			<p>Enter 1st no.:
			<input type="number" required name="num1" placeholder="Type the first number here" />
			</p>
			<!--2nd number here-->
			<p>Enter 2nd no.:
			<input type="number" required name="num2" placeholder="Type the second number here" />
			</p>
			<p>Select Operation:
			<!--operation selection using drop down-->
			<select name="operation" required >
				<option value="addition">Addition</option>
				<option value="subtraction">Subtraction</option>
				<option value="multiplication">Multiplication</option>
				<option value="division">Division</option>
			</select>
			</p>
			<!--Compute Button-->
			<button type="submit" name="compute">Compute</button>
			
			<!--End of form-->
			
		</form>
	</body>
</html>