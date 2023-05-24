<html>
	<head>
		<title>Display Numbers</title>
	</head>
	<body>
		<?php
			$num;
			
			//check if the button btnDisplay isClicked
			if(isset($_GET["btnDisplay"]))
			{
				//get the value of the textBox
				$num = $_GET["num"];
				
				//display numbers 1 up to num
				for($i=1; $i<$num; $i++)
				{
					echo $i;
					echo "<br/>";
					
					//concatenation
					echo $i. "<br/>";
				}
			}
		?>
	</body>
</html>