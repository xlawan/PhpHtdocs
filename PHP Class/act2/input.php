<html>
	<head>
		<title>PHP Act 2</title>
	</head>
	<body>
		<h1>PHP ACTIVITY 2</h1>
		<form action="compute.php" method="GET">
			<!--1st number here-->
			<p>Enter 1st no.:
			<input type="number" required name="num1" placeholder="Type the first number here" />
			</p>
			<!--2nd number here-->
			<p>Enter 2nd no.:
			<input type="number" required name="num2" placeholder="Type the second number here" />
			</p>
			<p>Select Operation:</p>
			<!--operation selection using radio button-->
			<input type="radio" required name="operation" value="addition"/>Addition<br/>
			<input type="radio" required name="operation" value="subtraction"/>Subtraction<br/>
			<input type="radio" required name="operation" value="multiplication"/>Multiplication<br/>
			<input type="radio" required name="operation" value="division"/>Division<br/>
			<br/><br/>
			<!--Compute Button-->
			<button type="submit" name="compute">Compute</button>
			
			<!--End of form-->
			
		</form>
	</body>
</html>