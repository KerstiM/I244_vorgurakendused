<?php
session_start(); //ei saa l�petada asja, mida pole alustatud

//muuda sessiooni k�psis kehtetuks
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '',
		time()-42000, '/');
}
//t�hjendada sessiooni massiiv
	$_SESSION = array();
// l�peta sessiioon
	session_destroy();
	
header("Location: pood.php");

?>