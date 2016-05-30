<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>HTML vormid</title>
	</head>
	<body>
		<form action="taastait.php" method="POST">
			Nimi 
			<input type="text" name="nimi" value="" />
			<br/>
			<label>Mees <input type="radio" name="sugu" value="Mees" 
					 
			/></label>
			<br/>
			<label>Naine <input type="radio" name="sugu" value="Naine" 
							/></label>	
			<br/>
			<textarea name="aadress" rows="3" cols="40"></textarea><br/>
			<select name="amet">
				<option value="0" >Vali amet!</option>
				<option  >korstnapühkija</option>
				<option  >kalamees</option>
				<option  >kingsepp</option>
			</select>
			<br/>
			<input type="submit" value="Saada!"/>
		</form>
			</body>
</html>