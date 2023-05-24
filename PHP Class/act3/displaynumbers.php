<html>
	<head>
		<title>Display Numbers</title>
		<style>
			th, td {
				padding-top: 10px;
				padding-bottom: 20px;
				padding-left: 30px;
				padding-right: 40px;
			}
		</style>
	</head>
	<body>
		<?php
			$num1;
			$num2;
			
			//check if the button btnDisplay isClicked
			if(isset($_GET["btnDisplay"]))
			{
				//get the value of the textBoxes
				$num1 = $_GET["num1"];
				$num2 = $_GET["num2"];
				//generate table
				echo "<table border =\"1\" style='border-collapse: collapse'>";
				//loop for columns
				for($i=1; $i<=$num2; $i++){ 
					echo "<tr> \n";
					
					//loop for rows
					for($j=1; $j<=$num1; $j++){
					 	echo "<td>".$i*$j."</td> \n";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>