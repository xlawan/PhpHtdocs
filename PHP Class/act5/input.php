<html>
	<head>
		<title>PHP Act 5</title>
	</head>
	<body>
		<h1>PHP ACTIVITY 5</h1>
		<form action="input.php" method="POST">
			<!--Input here-->
			<p>Input:
			<input type="text" required name="input" />
			</p>

			<!--submit Button-->
			<button type="submit" name="submit">Submit</button>
			
			<!--End of form-->
		</form>

		<?php
			//declare a variable
			$str;
			$vowelCount = 0;
			$consonantCount = 0;

			//determine first if the user has CLICKED the submit button
			//check if the user clicks the submit button
			if( isset($_POST['submit']) )
			{
				//get the inputted value from the textbox named: input
				$str = $_POST['input'];
				//display the inputted text
				echo "Input: $str </br>";
				//Converts the inputted text to lower case
				$str = strtolower($str);

				for($i = 0; $i < strlen($str); $i++)
				{
					//Checks the text for vowel characters
					if( $str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || $str[$i] == 'o' || $str[$i] == 'u')
					{
						//Counts vowel if true
						$vowelCount++;
					}
					//Checks for consonant characters without counting the spaces
					else if($str[$i] >= 'a' && $str[$i] <= 'z')
					{
						//Counts consonants if true
						$consonantCount++;
					}
				}
				//display results
				echo "No. of vowels: $vowelCount </br>";
				echo "No. of consonants: $consonantCount </br>";
		}
		?>

	</body>
</html>