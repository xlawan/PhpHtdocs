<html>
	<head>
		<title>Check Gender</title>
	</head>
	<body>
		<?php
			$gender;
			
			if(isset($_GET["check"]))
			{
				//get the inputted gender
				$gender = strtolower($_GET["gender"]);
				
				if($gender == "m") 
				{
					echo "Male";
				}
				elseif($gender == "f") 
				{
					echo "Female";
				}
				else 
				{
					echo "Invalid";
				}
					
			}
		
		
		?>
	</body>
</html>