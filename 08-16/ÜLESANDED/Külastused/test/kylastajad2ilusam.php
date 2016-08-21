<?php
session_start();
?>

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
    $loendur = "kylastajadLoenda2ilusam.txt";
      $f = fopen($loendur, "w");
      fwrite($f,"1");
      fclose($f);

    // Loe olemasolev väärtus failist
    $f = fopen($loendur,"r");
    $kylastajaid = fread($f, filesize($loendur));
    fclose($f);

    // kui selle sessiooniga pole külastajat lisatud, siis lisa
    if(!isset($_SESSION['hasVisited'])){
      $_SESSION['hasVisited']="yes";
      $kylastajaid++;
      $f = fopen($loendur, "w");
      fwrite($f, $kylastajaid);
      fclose($f);
    }
    echo $kylastajaid;
?>

    <center>
    	<p>Sa oled külastaja number <?php	echo $kylastajaid; ?> sellel lehel! </p>
    </center>
  </body>
</html>
