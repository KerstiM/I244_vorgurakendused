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
				global $connection;
				$u = mysqli_real_escape_string($connection, $_POST["kasutajanimi"]);
				$p = mysqli_real_escape_string($connection, $_POST["parool"]);
				$sql = "SELECT id, name FROM mar_users WHERE name = '$u' AND pass = SHA1('$p')";
				$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
				if($user=mysqli_fetch_assoc($result)) {
					$_SESSION["user"] = $user;
					$_SESSION["teade"] = "Oled sisse logitud!";
					header("Location: ?mode=galerii");
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

function kuva_galerii(){
	$pildid = hangi_pildid();
	include_once("view/head.html");
	include("view/galerii.html");
	include_once("view/foot.html");	
}

function kuva_upload(){
	global $connection;
	if(!empty($_SESSION["user"])) {
		if(!empty($_GET["id"])) {
			$i = $_GET["id"];
			$pilt = hangi_pilt($i);
		}
		$errors = array();
		if(!empty($_POST["pealkiri"])) {
			$peal = mysqli_real_escape_string($connection, $_POST["pealkiri"]);
			$pilt['pealkiri'] = $peal;
		} else {
			$errors[] = "Pealkiri on sisestamata!";
		}
		
		if(!empty($_POST["autor"])) {
			$aut = mysqli_real_escape_string($connection, $_POST["autor"]);
			$pilt['autor'] = $aut;
		} else {
			$errors[] = "Autor on sisestamata!";
		}
		
		if(empty($errors)) {
			$v2 = "fail1";
			$k2 = "img";
			$ajut2 = upload($v2, $k2);
			if ($ajut2 != "") {
				$pilt['pilt'] = $ajut2;
			} else {
				if (!empty($_GET["id"])) {
					$errors[] = "Suure pildid üleslaadimine ebaõnnestus!";
				}
			}
			$v1 = "fail2";
			$k1 = "thumb";
			$ajut = upload($v1, $k1);
			if ($ajut != "") {
				$pilt['thumb'] = $ajut;
			} else {
				if (!empty($_GET["id"])) {
					$errors[] = "Väikese pildid üleslaadimine ebaõnnestus!";
				}
			}
			
		}
		
		if(empty($errors)){
			$result=false;
			if(!empty($_GET["id"])) {
				$i = mysqli_real_escape_string($connection, $_GET["id"]);
				$t = $pilt['thumb'];
				$pi = $pilt['pilt'];
				$pe = $pilt['pealkiri'];
				$a = $pilt['autor'];
				$sql = "UPDATE mar_pildid SET thumb='$t', pilt='$pi', pealkiri='$pe', autor='$a' WHERE id=$i";
				$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
			} else {
				$t = $pilt['thumb'];
				$pi = $pilt['pilt'];
				$pe = $pilt['pealkiri'];
				$a = $pilt['autor'];
				$sql = "INSERT INTO mar_pildid (thumb, pilt, pealkiri, autor) VALUES ('$t', '$pi', '$pe', '$a')";
				$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
			}
			if($result) {
				$_SESSION["teade"] = "Pildi laadimine õnnestus!";
				header("Location: ?mode=galerii");
				exit(0);
			} else {
				$errors[] = "Pildi laadimine ebaõnnestus!";
			}
			
		}
		
		include_once("view/head.html");
		include("view/upload.html");
		include_once("view/foot.html");
	} else {
		$_SESSION["teade"] = "Piltide lisamiseks logi sisse!";
		header("Location: ?mode=avaleht");
		exit(0);
	}
}

function kuva_pilt(){
	$ids = koik_id();
	if(!empty($_GET["id"])) {
		$i = $_GET["id"];
	} else {
		$i = 0;
	}
	$eelmine = $i - 1;
	$jargmine = $i + 1;
	$suurus = count($ids) - 1;
		
	if($eelmine < 0){
		$eelmine = $suurus;
	}
	if($jargmine > $suurus){
		$jargmine = 0;
	}
	$pilt = hangi_pilt($ids[$i]);
	include_once("view/pilt.html");
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

function connect_db(){
  global $connection;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
  mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function hangi_pildid(){
	global $connection;
	$tulemused = array();
	$sql = "SELECT * FROM mar_pildid";
	$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
	while($row=mysqli_fetch_assoc($result)) {
		$tulemused[] = $row;
	}
	return $tulemused;
}

function hangi_pilt($id){
	global $connection;
	$sql = "SELECT * FROM mar_pildid WHERE id=$id";
	$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function koik_id(){
	global $connection;
	$numbers = array();
	$sql = "SELECT id FROM mar_pildid";
	$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
	while($row=mysqli_fetch_assoc($result)) {
		$numbers[] = $row['id'];
	}
	return $numbers;
}
	
function upload($name, $loc){
  $allowedExts = array("jpg", "jpeg", "gif", "png");
  $allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
  $extension = end(explode(".", $_FILES[$name]["name"]));

  if ( in_array($_FILES[$name]["type"], $allowedTypes)
   && ($_FILES[$name]["size"] < 100000) // see on 100kb
   && in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
    if ($_FILES[$name]["error"] > 0) {
      return "";
    } else {
      // vigu ei ole
      if (file_exists($loc."/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
        return $loc."/" . $_FILES[$name]["name"];
      } else {
        // kõik ok, aseta pilt
        move_uploaded_file($_FILES[$name]["tmp_name"], $loc."/" . $_FILES[$name]["name"]);
        return $loc."/" . $_FILES[$name]["name"];
      }
    }
  } else {
    return "";
  }
}

?>