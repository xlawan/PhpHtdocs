<html>
	<head>
		<title>Results ACT 4</title>
	</head>
	<body>
		<?php
			//declare a variable
			$num1; //num1
			$num2; //num2
			$oper; //operation to use
		
			//determine first if the user has CLIKCED the submit button
			//check if the user clicks the submit button
			if( isset($_POST["compute"]) == true ) 
			{
				//get the inputted value from the textbox named: num1
				$num1 = $_POST["num1"];
				
				//get the selected value from the textbox named: num2
				$num2 = $_POST["num2"];
				
				//get the inputted value from the checkbox named: operation
				$oper = $_POST["operation"];
				
				for($i=0; $i<count($oper); $i++) 
				{
					switch($oper[$i])
					{
						case "addition":
							echo "Addition: $num1 + $num2 = " .$num1 + $num2;
							echo "<br/>";
							break; 
						case "subtraction":
							echo "Subtraction: $num1 - $num2 = " .$num1 - $num2;
							echo "<br/>";
							break;
						case "multiplication":
							echo "Multiplication: $num1 * $num2 = " .$num1 * $num2;
							echo "<br/>";
							break; 
						case "division":
							echo "Division: $num1 / $num2 = " .$num1 / $num2;
							echo "<br/>";
							break;
					}
				}
				
			}
			//goes back to the input.php
			echo "<br/><br/><a href='input.php'>Go Back</a>";
		?>
	
	</body>
</html>