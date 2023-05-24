<html>
	<head>
		<title>PHP Act 6</title>
	</head>
	<body>
		<h1>PHP ACTIVITY 6</h1>
		<form action="input.php" method="POST">
			<!--Input here-->
			<p>Input:<br/>
			<textarea name="input" required></textarea>
			</p>

			<!--submit Button-->
			<button type="submit" name="submit">Submit</button>
			
			<!--End of form-->
		</form>

		<?php
			//declare variables
			$str;
			$resultarr = [];

			//check if the user clicks the submit button
			if( isset($_POST['submit']) )
			{
				//get the inputted value from the textbox named: input
				$str = $_POST['input'];

				//trim($str) will remove the left and right extra spaces of the inputted string
				$trimmedstr = trim($str);

				//loop to remove the extra spaces between words
				for ($i=0; $i<strlen($trimmedstr); $i++)
				{
					//check if array is out of bounds
					if ($trimmedstr[$i]==strlen($trimmedstr[$i])+1) 
						break;
						
					//check if the first and next input are both spaces
					if ($trimmedstr[$i]==" " && $trimmedstr[$i+1]==" ")
					{
						//do nothing if they are both spaces
					}
					else
					{
						//store input to an array
						$resultarr[$i] = $trimmedstr[$i];
					}
				}

				//display the inputted text
				//need to use implode function to convert array to string
				echo "Output:<br/> <textarea readonly>".implode($resultarr)."</textarea> <br/>"; 
			}
		?>
	</body>
</html>