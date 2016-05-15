<?php

$user = "test";
$pass = "t3st3r123";
$db = "test";
$host = "localhost"; 

$link = mysqli_connect($host, $user, $pass, $db) or die ("ei saanud ühendatud - ");

$sql = "SELECT * FROM KerstiM_loomaaed";
$result = mysqli_query($link, $sql) or die( $sql." - ".mysqli_error($link));

while($rida = mysqli_fetch_assoc($result)){
	//siin kasutan $rida muutujat
	echo "looma nimi on: {$rida['nimi']}, ta on {$rida['vanus']} aastat vana ja asub {$rida['puur']}. puuris </br>";
	
}

?>