<?php
function yheda(){
	global $link;

	$user="test";
	$pass="t3st3r123";
	$host="localhost";
	$db="test";

	$link = mysqli_connect($host, $user, $pass, $db) or die("Ei saanud baasiga ühendust");
	mysqli_query($link, "SET CHARACTER SET UTF8") or die("Ei saanud UTF8-t");
	
}


function login(){
	global $link;
	$errors=array();
		if (!empty($_POST)){
			if (isset($_POST['username']) && $_POST['username']!="") {
				// tee turvaliseks
				$_POST['username'] = mysqli_real_escape_string($link, $_POST['username']);
			} else {
				$errors["user"]="Kasutajanimi on puudu!";
			}
			if (isset($_POST['passwd']) && $_POST['passwd']!="") {
				// tee turvaliseks
				$_POST['passwd'] = mysqli_real_escape_string($link, $_POST['passwd']);
			} else {
				$errors["pass"]="parool on puudu!";
			}

			if (empty($errors)) {
			
				$result = mysqli_query($link, "SELECT id, kasutajanimi, roll FROM ttanav_kasutajad WHERE kasutajanimi = '{$_POST['username']}' AND parool = SHA1('{$_POST['passwd']}') ");
				//if ($result && mysqli_num_rows($result) > 0 ){
				if ($result && $user = mysqli_fetch_assoc($result) ){
					// $user eksisteerib
					$_SESSION['user']=$user; // $_SESSION['user']['id']
					$_SESSION['teade']="Tere tulemast {$_SESSION['user']['kasutajanimi']}!";
					header("Location: kontroller.php?mode=galerii");
					exit(0);
				} else {
					$errors["vale"]="Vale info, proovi uuesti!";
				}
			}
		}
		include("views/login.html");

}


function register(){
	global $link;
	$errors=array();
		if (!empty($_POST)){
			if (isset($_POST['username']) && $_POST['username']!="") {
				// tee turvaliseks
				$_POST['username'] = mysqli_real_escape_string($link, $_POST['username']);
			} else {
				$errors["user"]="Kasutajanimi on puudu!";
			}
			if (isset($_POST['passwd']) && $_POST['passwd']!="") {
				// tee turvaliseks
				$_POST['passwd'] = mysqli_real_escape_string($link, $_POST['passwd']);
			} else {
				$errors["pass"]="parool on puudu!";
			}
			if (isset($_POST['passwd2']) && $_POST['passwd2']!="") {
				// tee turvaliseks
				$_POST['passwd2'] = mysqli_real_escape_string($link, $_POST['passwd2']);
			} else {
				$errors["pass2"]="parool on puudu!";
			}
			if ( !empty($_POST['passwd']) && !empty($_POST['passwd2']) && $_POST['passwd2']!=$_POST['passwd'] ) {
				$errors['match']="paroolid ei klapi!";
			}

			if (empty($errors)) {
				$result = mysqli_query($link, "INSERT INTO ttanav_kasutajad (kasutajanimi, parool) VALUES ('{$_POST['username']}', SHA1('{$_POST['passwd']}') )");
				if ($result){ // mysqli_affected_rows($link);
					header("Location: kontroller.php?mode=login");
					exit(0);
				} else {
					$errors["vale"]="Andmbaasi mure, proovi uuesti!";
				}
			}
		}
		include("views/register.html");

}

function galerii(){
	global $pildid;
	include("views/galerii.html");
}





?>
