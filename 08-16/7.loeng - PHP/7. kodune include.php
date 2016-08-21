<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Discid</title>
</head>
<body>
<?php

$discid = array(
		array("firma" => "Discraft", "nimi" => "Avenger", "speed" => "11", "glide" => "4", "turn"=>"-1", "fade" => "2", "värv" => "punane", "url" => "http://www.discgolfstation.com/assets/images/prodigy-discs-m3.jpg" ),
    array("firma" => "Innova", "nimi" => "Roc3", "speed" => "10", "glide" => "3", "turn" => "0", "fade" => "3", "värv" => "roheline", "url" => "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT-wECYjLlhbHvFYHYk2HpJiUKb07KJbDAI-OXhz_bYpZUG9ZiC"),
    array("firma" => "Discmania", "nimi" => "TDX", "speed" => "11", "glide" => "5", "turn" => "3", "fade" => "-1", "värv" => "sinine","url" => "http://cdn2.bigcommerce.com/server100/b7bc6/products/10343/images/17206/M1_750_Halloween_Disc_SE__06729.1414116157.500.500.jpg?c=2"),
    array("firma" => "Prodigy", "nimi" => "D2", "speed" => "13", "glide" => "2", "turn" => "0", "fade" => "0", "värv" => "kollane","url" => "http://cdn3.bigcommerce.com/s-h5v7ps/products/777/images/675/A2_400_blue__85291.1453156303.400.400.jpg?c=2")

	);

  foreach ($discid as $disc) {
    include "7.kodune include.html";
  }
?>
</body>
</html>
