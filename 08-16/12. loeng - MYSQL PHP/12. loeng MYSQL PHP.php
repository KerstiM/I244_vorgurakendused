<?php

$user = "test"; //kasutajanimi phpmyadminnis
$pass = "t3st3r123"; //parool phpmyadminnis
$db = "test"; //andmebaasinmi on test phpmyadminnis
$host = "localhost"; //salvestame enose kettale -> serveri hosti aadressiks on localhost

//or: kui parempoolne ei käivitu, siis on vasakpoolne ja annab veateate
$link = mysqli_connect($host, $user $pass, $db) or die("ei saanud ühendatud - ") . mysqli_error());

//teeme päringu 0_loomaaed tabelist. Hangime kõik väljad.
$sql = "SELECT * FROM 0_loomaaed";
//paneme käima ka, salvestame muutujasse (parameetrid ühendus ja päring )
$result = mysqli_query($link, $sql) or die ( $sql. " - ". mysqli_error($link));

if (!empty($result)) {
  echo "Sain ridu!";
}
echo "<pre>";
print_r(mysqli_fetch_array($result)) {
  echo "</pre>";

echo "<pre>";
print_r(mysqli_fetch_assoc($result)) {
  echo "</pre>";
}
?>
