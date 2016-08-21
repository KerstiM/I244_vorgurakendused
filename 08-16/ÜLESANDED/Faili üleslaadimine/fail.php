<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Komm</title>
		<link rel="stylesheet" type="text/css" href="kommCSS.css" />
	</head>

	<body>
    <div id="wrap">
  	   <div id="content">
        	<h1>Lae fail üles:</h1>

					<form enctype="multipart/form-data" action="upload.php" method="POST">
				    <input type="file" name="pilt" />
				    <input type="submit" value="lae pilt" />
					</form>

					<?php
						include("upload.php");
					?>

    		</div>
		</div>
  </body>
</html>
