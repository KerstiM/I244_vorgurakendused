<?php

function connect_database(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
	
}

function end_session(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
 	 setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
}

function login(){

	if (isset($_POST['loggedinuser'])) {
		include_once("views/booking.php");
	}

	include_once("views/login.php");

	if (isset($_SERVER['REQUEST_METHOD'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (empty($_POST['user'])) {
				$errors[] = "Palun sisesta kasutajanimi ja parool.";
			}
			if (empty($_POST['pass'])) {
				$errors[] = "Palun sisesta kasutajanimi ja parool.";
			}

			if (empty($errors)){
				global $connection;
				$sisestatudusername = mysqli_real_escape_string($connection, $_POST["user"]);
				$sisestatudpassword = mysqli_real_escape_string($connection, $_POST["pass"]);
				$sql = "SELECT username, password FROM KerstiM_LennumaaKasutajad WHERE username='$sisestatudusername' AND password=SHA1('$sisestatudpassword')";
				$result = mysqli_query($connection, $sql) or die ("Sellise kasutajanimega kasutajat ei leidu");
				$rida = mysqli_num_rows($result);
				if ($rida > 0) { //user was found in db
					$_SESSION['loggedinuser'] = $sisestatudusername;
					header("Location: controller.php?page=main");
				} 
			}
		}
	}
}

function logout(){
	end_session();
	header('Location: controller.php?page=main');
}

function registration(){
	if (isset($_POST['loggedinuser'])) {
		include_once("views/booking.php");
	} else {
		include_once("views/registration.php");
	}

	if (isset($_SERVER['REQUEST_METHOD'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (empty($_POST['username_reg'])) {
				$errors[] = "Palun sisesta kasutajanimi.";
			}
			if ($_POST['password_reg1'] != $_POST['password_reg2']) {
				$errors[] = "Paroolid ei kattu, palun proovi uuesti.";
			}
			if (empty($_POST['password_reg1'])) {
				$errors[] = "Palun sisesta parool.";
			}
			if (empty($_POST['password_reg2'])) {
				$errors[] = "Palun korda parooli.";
			}

			if (empty($errors)){
				//sisestatud andmed andmebaasi
				//andmebaasist sisestatud kasutaja sessiooni
				//suuna broneerimise lehele, muidu kuva registration.php

				echo "Oled registreeritud!";

				global $connection;
				$registeredusername = mysqli_real_escape_string($connection, $_POST["username_reg"]);
				$registeredpassword = mysqli_real_escape_string($connection, $_POST["password_reg1"]);
				$sql = "INSERT INTO KerstiM_LennumaaKasutajad (username, password) VALUES ('$registeredusername', SHA1('$registeredpassword'))";
				$result = mysqli_query($connection, $sql) or die ("Proovi uuesti.");

				if ($result) {
					if (mysqli_insert_id($connection) > 0) {
						$_SESSION['loggedinuser'] = $registeredusername;
						header("Location: controller.php?page=booking");
						exit(0);
					}
				}
			}

			
			echo $registeredusername;
			echo $registeredpassword;
		}
	}
}


function kuva_main() {
	include_once("views/main.php");
}

function kuva_events() {
	include_once("views/events.php");
}

function kuva_gallery() {
	include_once("views/gallery.php");
}

function kuva_contact() {
	include_once("views/contact.php");
}

function kuva_booking() {
	include_once("views/booking.php");
}


?>