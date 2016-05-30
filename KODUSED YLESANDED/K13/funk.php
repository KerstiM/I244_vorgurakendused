<?php
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}
function kuva_puurid(){
	// siia on vaja funktsionaalsust
	global $connection;
	
	if (!empty($_SESSION["user"])) {
		$p = mysqli_query($connection, "select distinct(puur) as puur from KerstiM_loomaaed order by puur asc");
		$puurid = array();
		while ($r = mysqli_fetch_assoc($p)) {
			$l = mysqli_query($connection, "SELECT * FROM KerstiM_loomaaed WHERE  puur=" . mysqli_real_escape_string($connection, $r['puur']));
			while ($row = mysqli_fetch_assoc($l)) {
				$puurid[$r['puur']][] = $row;
			}
		}
	} else {
		header("Location: ?page=login");
	}
	include_once('views/puurid.html');
	
}
function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	
	//Kontrollib, kas kasutaja on juba sisse logitud. Kui on, suunab loomade vaatesse
	if (!empty($_SESSION["user"])) {
		header("Location: ?page=loomad");
	} else { 
		$errors = array(); //kontrollib, kas kasutaja on üritanud juba vormi saata. Kas päring on tehtud POST (vormi esitamisel) või GET (lingilt tulles) meetodil, saab teada serveri infost, mis asub massiivist $_SERVER võtmega 'REQUEST_METHOD'
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Kui meetodiks oli POST, kontrollida kas vormiväljad olid täidetud. Vastavalt vajadusele tekitada veateateid (massiiv $errors)
			if ($_POST["user"] != "" && $_POST["pass"] != "") {
				//kui kõik väljad olid täidetud, üritada andmebaasitabelist <sinu kasutajanimi/kood/>_kylalised selekteerida külalist, kelle kasutajanimi ja parool on vastavad	
				//NB! enne info lisamist päringusse, tuleb see kindlasti käia üle mysqli_real_escape_string funktsiooniga (vt. teoorias)		
				$u = mysqli_real_escape_string($connection, $_POST["user"]);
				$p = mysqli_real_escape_string($connection, $_POST["pass"]);
				$sql = "SELECT id, roll from KerstiM_kylastajad WHERE username = '$u' AND passw = SHA1('$p')";
				$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result)) {
					$_SESSION["user"] = $_POST["user"];
					$_SESSION["roll"] = mysqli_fetch_assoc($result)["roll"];
					header("Location: ?page=loomad");
				} else {
					$errors[] = "Kasutajatunnus on puudu!";
				}
			} else {
				$errors[] = "Kasutajatunnus või parool on puudu!";
			}
		}
	}
	include_once('views/login.html');
}
function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}
function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global  $connection;
	if (empty($_SESSION["user"])) {
		header("Location: ?page=login");
	} elseif ($_SESSION["roll"] != "admin") {
		header("Location: ?page=loomad");
	} else {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if ($_POST["nimi"] == "" || $_POST["puur"] == "") {
				$errors[] = "Nimi või puur on täitmata!";
			} elseif (upload("liik") == ""){
				$errors[] = "Faili saatmine ebaõnnestus";
			} else {
				$nimi = mysqli_real_escape_string($connection, $_POST["nimi"]);
				$puur = mysqli_real_escape_string($connection, $_POST["puur"]);
				$liik = mysqli_real_escape_string($connection, upload("liik"));
				$sql = "INSERT INTO KerstiM_loomaaed(nimi, puur, liik) VALUES ('$nimi', '$puur', '$liik')";
				$result = mysqli_query($connection, $sql);
				if (mysqli_insert_id($connection)) {
					header("Location: ?page=loomad");
				} else {
					header("Location: ?page=loomavorm");
				}
			}
		}
	}
	include_once('views/loomavorm.html');
}
function muuda(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global  $connection;
	if (empty($_SESSION["user"])) {
		header("Location: ?page=login");
	} elseif ($_SESSION["roll"] != "admin") {
		header("Location: ?page=loomad");
	} else {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if ($_POST["nimi"] == "" || $_POST["puur"] == "") {
				$errors[] = "Nimi või puur on täitmata!";
			} elseif ($_POST['id'] == ""){
				header("Location: ?page=loomad");
			} else {
				$id = mysqli_real_escape_string($connection, $_POST["id"]);
				$loom = hangi_loom($id);
				$nimi = mysqli_real_escape_string($connection, $_POST["nimi"]);
				$puur = mysqli_real_escape_string($connection, $_POST["puur"]);
				if (upload("liik")) {
					$liik = mysqli_real_escape_string($connection, upload("liik"));
				} else {
					$liik = $loom['liik'];
				}
				$sql = "UPDATE pploom_loomaaed SET nimi = '$nimi', puur = '$puur', liik = '$liik' WHERE id = '$id'";
				$result = mysqli_query($connection, $sql);
				header("Location: ?page=loomad");
			}
		} elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
			$id = mysqli_real_escape_string($connection, $_GET["id"]);
			if ($id == "") {
				header("Location: ?page=loomad");
			} else {
				$loom = hangi_loom($id);
			}
		}
	}
	include_once('views/editvorm.html');
}
function hangi_loom($id){
	global $connection;
	$sql = "SELECT * FROM KerstiM_loomaaed WHERE id='$id'";
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result)) {
		return mysqli_fetch_assoc($result);
	} else {
		header("Location: ?page=loomad");
	}
}
function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$ss = explode(".", $_FILES[$name]["name"]);
	$extension = end($ss);
	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}
?>