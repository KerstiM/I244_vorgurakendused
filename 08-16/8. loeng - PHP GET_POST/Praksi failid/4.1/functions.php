<?php

function alusta_sessioon() {
	//siin sees saab muuta ka sessiooni kehtivusaega
	session_start();
}

$user="test";
$pass="parool";

function lopeta_sessioon() {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-4200, '/');
	}
	session_destroy();
}

function login(){
	$errors=array();
		if (!empty($_POST)){
			if (isset($_POST['username']) && $_POST['username']!="") {
				// tee midagi
			} else {
				$errors["user"]="Kasutajanimi on puudu!";
			}
			if (isset($_POST['passwd']) && $_POST['passwd']!="") {
				// tee midagi
			} else {
				$errors["pass"]="parool on puudu!";
			}

			if (empty($errors)) {
				header("Location: kontroller.php?mode=galerii");
				exit(0);
			}
		}
		include("views/login.html");

}


function register(){
	$errors=array();
		if (!empty($_POST)){
			if (isset($_POST['username']) && $_POST['username']!="") {
				// tee midagi
			} else {
				$errors["user"]="Kasutajanimi on puudu!";
			}
			if (isset($_POST['passwd']) && $_POST['passwd']!="") {
				// tee midagi
			} else {
				$errors["pass"]="parool on puudu!";
			}
			if (isset($_POST['passwd2']) && $_POST['passwd2']!="") {
				// tee midagi
			} else {
				$errors["pass2"]="parool on puudu!";
			}
			if ( !empty($_POST['passwd']) && !empty($_POST['passwd2']) && $_POST['passwd2']!=$_POST['passwd'] ) {
				$errors['match']="paroolid ei klapi!";
			}

			if (empty($errors)) {
				header("Location: kontroller.php?mode=login");
				exit(0);
			}
		}
		include("views/register.html");

}

function galerii(){
	global $pildid;
	include("views/galerii.html");
}





?>
