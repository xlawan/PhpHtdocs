<html>
	<head>
		<title>List All Items</title>
	</head>
	<body>
		<?php
			session_start();

			//if user is not yet logged in
			if(! isset($_SESSION["username"]))
			{
				header("location: http://localhost/session/login/login.php");
				exit;
			}
		?>
		<h1>Home</h1>
		<hr />
		<?php
			echo "<p>Hello ''".$_SESSION["username"]."''!!!</p>";
		?>
		<a href="http://localhost/session/login/logout.php">Logout</a>
		<h1>Search</h1>
		
		<form method="GET" action="list_all.php">
			<input type="text" name="keyword" value="" placeholder="Type keyword here..." />
			<button type="submit" name="search">Search</button>		
		</form>	
		<button onclick='window.location.href="list_all.php";'>Refresh Page</button>

		<h1>Search Results</h1>
		<?php include 'search_items.php' ?>
		<hr>
		<h1>Display all items</h1>	
		<?php include 'delete_item.php'?>
		<button onclick='window.location.href="add_item.php";'>Add Item</button>
		<br><br>
		<?php
			$con = mysqli_connect("localhost", "root", "", "inventory");
			if($con)
			{
				$sql = " select 
							item.iid,
							item.description,
							item.umsr,
							category.description,
							item.qtyonhand,
							item.price
						 from
							item left join category
								on item.cid = category.cid
						 order by
							item.description
				";
				$records = mysqli_query($con, $sql);
				if(mysqli_num_rows($records) > 0)
				{
					echo "<table border='1'>";
					echo "	<tr>";
					echo "		<th>Seq. No.</th>";
					echo "		<th>Item ID</th>";
					echo "		<th>Description</th>";
					echo "		<th>Unit of Measure</th>";
					echo "		<th>Category</th>";
					echo "		<th>Qty. on Hand</th>";
					echo "		<th>Price</th>";
					echo "		<th>Update</th>";
					echo "		<th>Delete</th>";
					echo "	</tr>";
					
					$seq = 1;
					while($rec = mysqli_fetch_array($records))
					{
						
						echo "<tr>";
						echo "		<td>".$seq.".</td>";   //sequnce number
						echo "		<td>".$rec[0]."</td>"; //item id
						echo "		<td>".$rec[1]."</td>"; //description
						echo "		<td>".$rec[2]."</td>"; //unit of measurement
						if ($rec[3] == null) 
						{
							echo "		<td>FLD</td>"; //category
						}
						else
						{
							echo "		<td>".$rec[3]."</td>"; //category
						}
						echo "		<td align='right'>".$rec[4]."</td>"; //qty.
						echo "		<td align='right'>".$rec[5]."</td>"; //price
						echo "		<td><a href='update.php?rec0=$rec[0]&rec1=$rec[1]&rec2=$rec[2]&rec3=$rec[3]&rec4=$rec[4]&rec5=$rec[5]'>Update</a></td>";
						echo "		<td><a href='list_all.php?row=$rec[0]'>Delete</a></td>";	
						echo "</tr>";
						$seq++;
					}
					
					
					echo "</table>";
				}
				else 
				{
					echo "<p>No records found...</p>";
				}
				
			}
			else 
			{
				echo "<p>Error connecting to DB...</p>";
			}
			mysqli_close($con);			
		
		?>
		<hr>
	</body>
</html>