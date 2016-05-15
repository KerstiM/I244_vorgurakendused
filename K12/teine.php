<?php

$user = "test";
$pass = "t3st3r123";
$db = "test";
$host = "localhost"; 

$link = mysqli_connect($host, $user, $pass, $db) or die ("ei saanud ühendatud - ");
mysqli_query($link, "SET CHARACTER SET UTF8")or die( $sql." - ".mysqli_error($link));
$v2ljad = "nimi, vanus, puur";

$sql = "SELECT $v2ljad FROM KerstiM_loomaaed";
$result = mysqli_query($link, $sql) or die( $sql." - ".mysqli_error($link));
//veateated võtke laivi minnes ära, turvaauk!
while($rida = mysqli_fetch_assoc($result)){
	//siin kasutan $rida muutujat
	echo "looma nimi on: {$rida['nimi']}, ta on {$rida['vanus']} aastat vana ja asub {$rida['puur']}. puuris <br/>";
}
mysqli_free_result($result); //vabastab päringu tulemuse poolt hõivatud mälu

//viisakas kasutada mysqli_close($link); pho pannakse muidu niisamagi automaatselt kinni

// turvalisus: .mysqli_real_escape_string
// turvalisus: printimiseks: htmlspecialchars()
?>