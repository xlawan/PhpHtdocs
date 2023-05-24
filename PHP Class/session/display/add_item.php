<?php
	session_start();

	//if user is not yet logged in
	if(! isset($_SESSION["username"]))
	{
		header("location: http://localhost/session/login/login.php");
		exit;
	}
	$description = "";
	$umsr = "";
	$category = "";
	$qty = "";
	$price = "";
	
	
	if(isset($_POST["save"]))
	{
		//check if the elements or inputs are still there
		if(!isset($_POST["description"]) || !isset($_POST["umsr"]) || !isset($_POST["category"]) || !isset($_POST["qtyonhand"]) || !isset($_POST["price"]))
		{
			echo "<p>Something is wrong with the form. A Hacker defaced it.</p>";					
		} 
		else
		{	
			$description = trim($_POST["description"]);
			$umsr = $_POST["umsr"];
			$category = $_POST["category"];
			$qty = trim($_POST["qtyonhand"]);
			$price = trim($_POST["price"]);
			
			//error trapping start
			if($description == "" || $umsr == "" || $category == "" || $qty == "" || $price == "")
			{
				echo "<p>Sorry, description, unit of measurement, category, quantity, and price must not be empty. </p>";	
				//exit;	
						
			}
			else if(!is_numeric($qty) || !is_numeric($price))
			{
				echo "<p>Sorry, Quantity on Hand must be a number. </p>";
				//exit;
				$description = trim($_POST["description"]);
				$umsr = $_POST["umsr"];
				$category = $_POST["category"];
				$qty = trim($_POST["qtyonhand"]);
				$price = trim($_POST["price"]);
			}
			else if($qty < 0 || $price < 0)
			{
				echo "<p>Sorry, Quantity on Hand must not be less than to '0'. </p>";
				//exit;
			}
			else if(($umsr == "pc" && fmod($qty,1) !==0.00) || ($umsr == "set" && fmod($qty,1) !==0.00) || ($umsr == "doz" && fmod($qty,1) !==0.00))
			{
				echo "<p>Sorry, Quantity on Hand for pc, set, and dozen must not have decimal values. </p>";
				//exit;
			}
			//error trapping end
			else 
			{
				$con = mysqli_connect("localhost", "root", "", "inventory");
				if($con)
				{
					$sql = "insert into item (description, umsr, cid, qtyonhand, price) 
							values ('".$description."', '".$umsr."', ".$category.", ".$qty.", ".$price.") ";
					mysqli_query($con, $sql);
					echo "<p>Item was saved successfully...</p>";
					
				}
				else 
				{
					echo "<p>Error connecting to DB...</p>";
				}
				mysqli_close($con);
			}
			
		}
	}

?>
<html>
	<head>
		<title>Add Item</title>
	</head>
	<body>
		<form method="POST" action="add_item.php">
			<table>
				<tr>
					<td>Description:</td>
					<td><input type="text" name="description" value="<?php echo $description?>" required /></td>
				</tr>
				<tr>
					<td>Unit of Measure:</td>
					<td>
						<select name="umsr">
							<option value="pc" <?php if($umsr == "pc") 	echo "selected"; ?>>pc</option>
							<option value="set" <?php if($umsr == "set") 	echo "selected"; ?>>set</option>
							<option value="kl" <?php if($umsr == "kl") 	echo "selected"; ?>>kilo</option>
							<option value="doz" <?php if($umsr == "doz") 	echo "selected"; ?>>dozen</option>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Category:</td>
					<td>
						<?php
							$con = mysqli_connect("localhost", "root", "", "inventory");
							if($con)
							{
								$categories = mysqli_query($con, "select * from category order by description");
								if(mysqli_num_rows($categories) > 0)
								{
									echo "<select name='category'>";
									while($row = mysqli_fetch_row($categories))
									{
										echo "<option value='".$row[0]."'";
										if($category == $row[0]) echo 'selected';
										echo ">".$row[1]."</option>";
									}
									echo "</select>";
								}
							}
							else 
							{
								echo "<p>Error DB Connection</p>";
							}
							
						?>
					</td>
				</tr>
				<tr>
					<td>Quantity on Hand:</td>
					<td><input type="text" name="qtyonhand" required value="<?php echo $qty?>" /></td>
				</tr>	
				<tr>
					<td>Price:</td>
					<td><input type="text" name="price" required value="<?php echo $price?>" /></td>
				</tr>	
				<tr>
					<td></td>
					<td><button type="submit" name="save">Save</button></td>
				</tr>				
			</table>
			
		</form>
		<button onclick='window.location.href="list_all.php";'>Go Back to Main</button>
	</body>
</html>