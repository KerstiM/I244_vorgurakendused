<?php
ini_set("display_errors", 1);

function kuva_avaleht(){
	include_once("view/head.html");
	include("view/avaleht.html");
	include_once("view/foot.html");
}

function kuva_register(){
	if(empty($_SESSION["user"])) {
		include_once("view/head.html");
		include("view/register.html");
		include_once("view/foot.html");
	} else {
		header("Location: ?mode=avaleht");
		exit(0);
	}
}

function kuva_login(){
	if(empty($_SESSION["user"])) {
		if (!empty($_POST)){
			$errors = array();
			if(!empty($_POST["kasutajanimi"])) {
				//tee midagi
			} else {
				$errors[] = "Kasutajanimi on sisestamata!";
			}
		
			if(!empty($_POST["parool"])) {
				//tee midagi
			} else {
				$errors[] = "Parool on sisestamata!";
			}
		
			if(empty($errors)) {
				if ($_POST["kasutajanimi"] == "kasutaja" && $_POST["parool"] == "parool") {
					//kõik ok
					$_SESSION["user"] = $_POST["kasutajanimi"];
					$_SESSION["teade"] = "Oled sisse logitud!";
					header("Location: ?mode=blogi");
					exit(0);
				} else {
					$errors[] = "Kasutajanimi ja/või parool on vale!";
				}
			}
		}
		include_once("view/head.html");
		include("view/login.html");
		include_once("view/foot.html");
	} else {
		header("Location: ?mode=avaleht");
		exit(0);
	}
}

function kuva_blogi(){
	if(!empty($_SESSION["user"])) {
		global $tekstid;
		include_once("view/head.html");
		include("view/blogi.html");
		include_once("view/foot.html");
	} else {
		$_SESSION["teade"] = "Blogi lugemiseks logi sisse!";
		header("Location: ?mode=avaleht");
		exit(0);
	}
}

function kuva_write(){
	if(!empty($_SESSION["user"])) {
		include_once("view/head.html");
		include("view/write.html");
		include_once("view/foot.html");
	} else {
		$_SESSION["teade"] = "Sissekande lisamiseks logi sisse!";
		header("Location: ?mode=avaleht");
		exit(0);
	}
}

function logout(){
	lopeta_sessioon();
	header("Location: ?mode=avaleht");
	exit(0);
}

function alusta_sessioon(){
	session_set_cookie_params(30*60);
	session_start();
}
	
function lopeta_sessioon(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
 	 setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
}

?>