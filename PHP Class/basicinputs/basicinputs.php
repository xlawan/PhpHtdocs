<html>
	<head>
	</head>
	<body>
	
		<form action="process.php" method="GET">
		<!--comment -->
			<input type="text" required name="lastname" size="30" maxlength="5" placeholder="Type your lastname here" value="123" />
			<br/>
			<select name="gender" required >
				<option value="M">Male</option>
				<option value="F">Female</option>
			</select>
			<br/>
			<textarea maxlength="30" required name="comment" placeholder="Type your comment here" rows="5" cols="50">No comment</textarea>
			<br/>
			<input type="number" required />
			<br/>
			<br/>
			<br/>
			<p>What is your most favorite food?</p>
			<input type="radio" required name="foods" value="Lechon Manok"/>Lechon Manok<br/>
			<input type="radio" required name="foods" value="Lechon Baboy"/>Lechon Baboy<br/>
			<input type="radio" required name="foods" value="Kinilaw na Tangige"/>Kinilaw na Tangige<br/>
			<input type="radio" required name="foods" value="Chicharon"/>Chicharon<br/>
			<br/>
			<p>Who is your most favorite singer?</p>
			<input type="radio" required name="singers" value="Morissette"/>Morissette<br/>
			<input type="radio" required name="singers" value="Katrina"/>Katrina<br/>
			<input type="radio" required name="singers" value="Regine"/>Regine<br/>
			<br/>
			<br/>
			<br/>
			<p>What are your favorite genre of songs?</p>
			<input type="checkbox" name="songs[]" value="Pop"/>Pop<br/>
			<input type="checkbox" name="songs[]" value="Rock"/>Rock<br/>
			<input type="checkbox" name="songs[]" value="Ballad"/>Ballad<br/>
			<input type="checkbox" name="songs[]" value="Opera"/>Opera<br/>
		
			<button type="submit" name="save">Save Record</button>
		</form>
		
	</body>
</html>