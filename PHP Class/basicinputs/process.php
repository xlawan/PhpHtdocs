<html>
	<head>
		<title>Process Inputs</title>
	</head>
	<body>
		<?php
			//declare a variable
			$var1;
			$var2;
			$var3; //textarea
			$var4; //radiobutton foods
			$var5; //radiobutton singers
			$var6; //checkboxes songs
		
			//determine first if the user has CLIKCED the submit button
			//check if the user clicks the submit button
			if( isset($_GET["save"]) == true ) 
			{
				//get the inputted value from the textbox named:
				$var1 = $_GET["lastname"];
				
				//get the selected value from the combo box named
				$var2 = $_GET["gender"];
				
				//get the inputted value from the textarea named: comment
				$var3 = $_GET["comment"];
				
				//get the selected radio button from the group named: foods
				$var4 = $_GET["foods"];
				
				//get the selected radio button from the group named: foods
				$var5 = $_GET["singers"];
				
				//get the selected checkboxes named: songs
				//exclude the pair of brackets: []
				//check first if there is at least 1 checkbox that is selected
				if( isset($_GET["songs"] ) == true)
				{
					$var6 = $_GET["songs"]; //php knows that this is an array value
				}
				else
				{
					//display error message if none
					echo "<p>Please select at least one genre.</p>";
				}
				//display the content of $var1
				echo "<p>Hello $var1 </p>";
				
				//display the selected gender
				echo "<p>Your gender is $var2</p>";
				
				//display the comment
				echo "<p>Your comment: $var3</p>";
				
				//display the selected food
				echo "<p>Your favorite food: $var4</p>";
				
				//display the selected singer
				echo "<p>Your favorite singer: $var5</p>";
				
				//display the selected checkboxes
				//you must perform a loop to var6 variable
				echo "<p>Your favorite genre of songs: </p>";
				for($i=0; $i<count($var6); $i++) 
				{
					echo $var6[$i]; //display each checkboxes' value
					echo "<br/>";
				}
			}
			
			echo "<a href='basicinputs.php'>Go Back</a>";
		?>
	
	</body>
</html>