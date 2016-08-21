<?php
//VEATEATED PEAB VÄLJA VÕTMA LAIVIS KOODIST! TURVAAUK!
$user = "test"; //kasutajanimi phpmyadminnis
$pass = "t3st3r123"; //parool phpmyadminnis
$db = "test"; //andmebaasinmi on test phpmyadminnis
$host = "localhost"; //salvestame enose kettale -> serveri hosti aadressiks on localhost

//or: kui parempoolne ei käivitu, siis on vasakpoolne ja annab veateate
$link = mysqli_connect($host, $user $pass, $db) or die("ei saanud ühendatud - ") . mysqli_error());
//utf-8 sättimine
mysqli_query($link, "SET CHARACTER SET UTF8") or die( $sql. " - ". mysqli_error($link));

//teeme päringu 0_loomaaed tabelist. Hangime kõik väljad.
$sql = "SELECT * FROM 0_loomaaed";
//paneme käima ka, salvestame muutujasse (parameetrid ühendus ja päring )
$result = mysqli_query($link, $sql) or die ( $sql. " - ". mysqli_error($link));

//teeb kuni on ridu mida pärida
while ( $rida = mysqli_fetch_assoc($result) ) {
  //siin kasutan $rida muutujat
  echo "looma nimi on: {$rida["nimi"]}, ta on {$rida["vanus"]} aastat vana ja asub {$rida["puur"]}. puuris<br/>";
}

mysqli_free_result($result); //vabastame päringu tulemuse poolt hõivatud mälu. on juba kirjas muutujas $result

//andmebaasi sulgemine
//mysqli_close($link);

?>
