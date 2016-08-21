<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>KELL</title>
    <link rel="stylesheet" type="text/css" href="Serverikell.css">
	</head>

  <!--lehe kuvamisel avab funktsiooni-->
	<body onload="kuvaArvutiKell()">
		<div class="kell">
	    <!--Siia kuvame kellaaja-->
	    <p> ARVUTI kell on: </p>
	    <p id="aKell"></p>
		</div>

		<div class="kell">
	    <p id="sKell">
				<?php
	    		echo "SERVERI kell on: <br/>". date("h:i:sa");
	    	?>
			</p>
		</div>

    <script src="Serverikell.js"></script>

	</body>
</html>
