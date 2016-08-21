<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>LIKE counter</title>
    <link rel="stylesheet" href="Like.css">
	</head>
	<body>

		<h1>Palun anna LIKE sellele lehele!</h1>

		<?php
			$loendur = "likeCounter.txt";
			$likedeArv = file_get_contents($loendur);
			$likedeArv = $likedeArv + 1;
			file_put_contents($loendur, $likedeArv);
		?>

		<center>
			<form action="Like.php" method="POST">
  			<input type="submit" name="LikedeArv" value="LIKE!"/>
			</form>
			<p>Like'de arv: <?php	echo $likedeArv; ?> </p>
			<p>Like'de arv: <?php	echo $_POST[] ?> </p>
			<br>
    </center>

	</body>
</html>
