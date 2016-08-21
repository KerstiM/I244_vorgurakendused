<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>KÜLASTAJAD counter</title>
    <link rel="stylesheet" href="kylastajadCSS.css">
	</head>
	<body>
		<h1>KÜLASTAJATE LOENDAMINE!</h1>
    <?php
    session_start();

    //$loendur = "kylastajadLoenda.txt";

    $f = fopen("kylastajadLoenda.txt", "w");
      fwrite($f,"1");
      fclose($f);

    // Read the current value of our counter file
    $f = fopen("kylastajadLoenda.txt","r");
    $kylastajaid = fread($f, filesize("kylastajadLoenda.txt"));
    fclose($f);
    // Has visitor been counted in this session?
    // If not, increase counter value by one
    if(!isset($_SESSION['hasVisited'])){
      $_SESSION['hasVisited']="yes";
      $kylastajaid++;
      $f = fopen("kylastajadLoenda.txt", "w");
      fwrite($f, $kylastajaid);
      fclose($f);
    }
    ?>
    <center>
    	<p>Sa oled külastaja number <?php	echo $kylastajaid; ?> sellel lehel! </p>
    </center>

	</body>
</html>

<?php

?>
