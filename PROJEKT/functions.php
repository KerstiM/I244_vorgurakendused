<?php
ini_set("display_errors", 1);
//ühendus andmebaasiga
function connect_database(){
  global $connection;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
  mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));    
}
//alusta sessioon
function start_session(){
	session_set_cookie_params(30*60);
	session_start();
}
//lõpeta sessioon
function end_session(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
 	 setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
}
//logout ja lõpeta sessioon
function logout(){
    end_session();
    header('Location: controller.php?page=main');;
    exit(0);
}

function kuva_registration() {
    if(!empty($_POST)) {
        $errors = array();
        if(empty($_POST["kasutajanimi"]) and empty($_POST["parool"]) and empty($_POST["parool2"]) ){
            $errors[] = "Sisesta andmed!";
        }
        
        if(!empty($_POST["kasutajanimi"])){
            //kontroll, kas samasuguse kasutajanimi on juba andmebaasis olemas
            global $connection;
            $u = $_POST["kasutajanimi"];
            $stmt = mysqli_prepare ($connection, "SELECT id FROM KerstiM_LennumaaKasutajad WHERE username=?");
            mysqli_stmt_bind_param($stmt, "s", $u);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result ($stmt, $r["id"]);
            if (mysqli_stmt_fetch($stmt)){
                $errors[] = "Selline kasutanimi on olemas!";
            }
        } else {
            $errors[] = "Kasutajanimi on sisestamata!";
        }
		
		if (strlen($_POST["kasutajanimi"]) < 5) {
				$errors[] = "Palun sisesta vähemalt 5 märki.";
			}
        
        if(!empty($_POST["parool"])){
            $p = $_POST["parool"];
        } else {
            $errors[] = "Parool on sisestamata!";
        }
		
		if (strlen($_POST["parool"]) < 5) {
				$errors[] = "Palun sisesta vähemalt 5 märki.";
			}
        
        if(!empty($_POST["parool2"])){
            $p2 = $_POST["parool2"];
            if ($p != $p2){
                $errors[] = "Paroolid ei ühti!";
            }
        } else {
            $errors[] = "Sisesta parool kaks korda!";
        }
        
        if(empty($errors)){
            //kasutaja registreerimine andmebaasi
            global $connection;
            $stmt = mysqli_prepare ($connection, "INSERT INTO KerstiM_LennumaaKasutajad (username, password) VALUES (?, SHA1(?))");
            mysqli_stmt_bind_param($stmt, "ss", $u, $p);
            if (mysqli_stmt_execute($stmt)){
				header("Location: controller.php?page=login");
                exit(0);
            } else {
                $errors[] = "Registreerimine ebaõnnestus!";
            }
        }
    }
    include_once("head.php");
    include("views/registration.php");
    include_once("foot.php");
}

function kuva_login() {
	
	if (isset($_POST['loggedinuser'])) {
		include_once('views/booking.php');
	}

    if(!empty($_POST)) {
        $errors = array();
        if(empty($_POST["kasutajanimi"]) and empty($_POST["parool"])){
            $errors[] = "Sisesta andmed!";
        }
        
        if(!empty($_POST["kasutajanimi"])){
            $u = $_POST["kasutajanimi"];
        } else {
            $errors[] = "Kasutajanimi on sisestamata!";
        }
        
        if(!empty($_POST["parool"])){
            $p = $_POST["parool"];
        } else {
            $errors[] = "Parool on sisestamata!";
        }
        
        if(empty($errors)){
            //kasutajanime ja parooli kontroll
			
            global $connection;
			$sisestatudusername = mysqli_real_escape_string($connection, $_POST["user"]);
			$sisestatudpassword = mysqli_real_escape_string($connection, $_POST["pass"]);
            
			$stmt = mysqli_prepare ($connection, "SELECT id, username FROM KerstiM_LennumaaKasutajad WHERE username=? AND password=SHA1(?)");
            mysqli_stmt_bind_param($stmt, "ss", $u, $p);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result ($stmt, $r["id"], $r["name"]);
            if (mysqli_stmt_fetch($stmt)){
                $_SESSION["user"] = $r["id"];
                $_SESSION["username"] = $r["name"];
				$_SESSION["loggedinuser"] = $sisestatudusername;
				header("Location: controller.php?page=booking");
                exit(0);
            } else {
                $errors[] = "Kasutajanimi või parool on vale!";
            }
        
			
		}
	}
	include_once("head.php");
    include("views/login.php");
    include_once("foot.php");
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