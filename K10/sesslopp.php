<?php
session_start(); //ei saa lõpetada asja, mida pole alustatud

//muuda sessiooni küpsis kehtetuks
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '',
		time()-42000, '/');
}
//tühjendada sessiooni massiiv
	$_SESSION = array();
// lõpeta sessiioon
	session_destroy();
	
header("Location: pood.php");

?>