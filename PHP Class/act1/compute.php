<html>
	<head>
		<title>Results</title>
	</head>
	<body>
		<?php
			//declare a variable
			$var1; //num1
			$var2; //num2
			$var3; //operation to use
		
			//determine first if the user has CLIKCED the submit button
			//check if the user clicks the submit button
			if( isset($_GET["compute"]) == true ) 
			{
				//get the inputted value from the textbox named: num1
				$var1 = $_GET["num1"];
				
				//get the selected value from the textbox named: num2
				$var2 = $_GET["num2"];
				
				//get the inputted value from the combo box named: operation
				$var3 = $_GET["operation"];
				
				
				switch($var3)
				{
					case "addition":
						echo "$var1 + $var2 = " .$var1 + $var2;
						break; 
					case "subtraction":
						echo "$var1 - $var2 = " .$var1 - $var2;
						break;
					case "multiplication":
						echo "$var1 * $var2 = " .$var1 * $var2;
						break; 
					case "division":
						echo "$var1 / $var2 = " .$var1 / $var2;
						break;
				}
				
			}
			//goes back to the input.php
			echo "<br/><br/><a href='input.php'>Go Back</a>";
		?>
	
	</body>
</html>