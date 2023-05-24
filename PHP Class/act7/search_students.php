<html>
	<head>
		<title>Search Students</title>
	</head>
	<body>
		<form method="GET" action="search_students.php">

			<input type="text" name="keyword" value="" placeholder="Type keyword here..." />
			<button type="submit" name="search">Search</button>		
		</form>		
		<?php
			$keyword = "";
			$id = array();
			
			if(isset($_POST["delete"]))
			{
				if(isset($_POST["id"]))
				{
					$id = $_POST["id"];

					//establish a connection to the database
					$connection = mysqli_connect("localhost", "root", "", "school");					
					for($i=0; $i<count($id); $i++)
					{
						mysqli_query($connection, "delete from student where id = ".$id[$i]." ");					
					}
					echo "<p>Deleted successfully...</p>";
					mysqli_close($connection);	
				}
				else 
				{
					echo "<p>Please select at least 1 record to be deleted.</p>";
				}
				
			}

			if(isset($_GET["search"]))
			{
				$keyword = trim($_GET["keyword"]);
				
				//establish a connection to the database
				$connection = mysqli_connect("localhost", "root", "", "school");
			
				//check if the connection was successful
				if($connection)	
				{
					//get all the records from the student table
					$records = mysqli_query($connection, "select * from student where lastname like '%".$keyword."%' or firstname like '%".$keyword."%' or course like '%".$keyword."%'  order by lastname, firstname");					
					
					//check if there are records retrieved
					if(mysqli_num_rows($records) > 0)
					{
						//form the table
						echo "<form method='POST' action='search_students.php'>";
						echo "<table border='1'>";
						echo "	<thead>";
						echo "		<tr>";
						echo "			<th>ID</th>";
						echo "			<th>Lastname</th>";
						echo "			<th>Firstname</th>";
						echo "			<th>Course</th>";
						echo "			<th>Year</th>";
						echo "			<th><button type='submit' name='delete'>Delete Selected</button></th>";
						echo "			<th></th>";
						echo "		</tr>";
						echo "	</thead>";
						echo "	<tbody>";
						
						// loop each record $records variable and display it row by row
						while($rec = mysqli_fetch_row($records))
						{
							echo "<tr>";
							echo "		<td>".$rec[0]."</td>";
							echo "		<td>".$rec[1]."</td>";
							echo "		<td>".$rec[2]."</td>";
							echo "		<td>".$rec[3]."</td>";
							echo "		<td>".$rec[4]."</td>";
							echo "		<td><input type='checkbox' name='id[]' value='".$rec[0]."' /></td>";
							echo "		<td><a href='search_students.php?row=$rec[0]'>Delete</a></td>";
							echo "</tr>";
						}
						echo "	</tbody>";
						echo "</table>";
						echo "</form>";
					}
					else 
					{
						//no records retrieved
						echo "<p>No records retrieved.</p>";
					}
					mysqli_close($connection);					
				}
				else 
				{
					echo "<p>Error connecting to DB.</p>";
				}
			}

			//single delete data
			if(isset($_GET["row"]))
			{
				if(isset($_GET["row"]))
				{
					$rowdata=$_GET["row"];
					//establish a connection to the database
					$connection = mysqli_connect("localhost", "root", "", "school");					
					
					mysqli_query($connection, "delete from student where id = '$rowdata'");
					echo "<p>Deleted successfully...</p>";
					mysqli_close($connection);	
				}
				else 
				{
					echo "<p>Error connecting to DB.</p>";
				}	
			}
		?>
	</body>
</html>