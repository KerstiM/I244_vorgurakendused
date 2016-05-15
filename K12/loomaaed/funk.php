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

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
	
	//Kontrollib, kas kasutaja on juba sisse logitud. Kui on, suunab loomade vaatesse
	if (isset($_SESSION['user'])) {
		header ('Location:?page=loomad');
	}else {
		//kontrollib, kas kasutaja on üritanud juba vormi saata. Kas päring on tehtud POST (vormi esitamisel) või GET (lingilt tulles) meetodil, saab teada serveri infost, mis asub massiivist $_SERVER võtmega 'REQUEST_METHOD'
    //Kui meetodiks oli POST, kontrollida kas vormiväljad olid täidetud. Vastavalt vajadusele tekitada veateateid (massiiv $errors)
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (empty($_POST['user'])) {
					$errors[] = "Kasutajatunnus on puudu!";
				}
			if (empty($_POST['pass'])) {
					$errors[] = "Parool on puudu!";
				}
		//kui kõik väljad olid täidetud, üritada andmebaasitabelist <sinu kasutajanimi/kood/>_kylalised selekteerida külalist, kelle kasutajanimi ja parool on vastavad	
		//NB! enne info lisamist päringusse, tuleb see kindlasti käia üle mysqli_real_escape_string funktsiooniga (vt. teoorias)	
		if (empty($errors)) {
				global $connection;
		$kasutaja = mysqli_real_escape_string($connection,($_POST['user']));
		$parool = mysqli_real_escape_string($connection, ($_POST['pass']));
		
	
		$query = "select * from KerstiM_kylastajad where username = '$kasutaja' and passw= SHA1('$parool')";
		$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
		$rows = mysqli_num_rows($result);
		
		//Kui selle SELECT päringu tulemuses on vähemalt 1 rida (seda saab teada mysqli_num_rows funktsiooniga) siis lugeda kasutaja sisselogituks -> luua sessiooniväli 'user' ning suunata ta loomaaia vaatesse
		//igasuguste vigade korral ning lehele esmakordselt saabudes kuvatakse kasutajale sisselogimise vorm failist login.html
		if ($rows>=1) {
			$_SESSION['user'] = $kasutaja;
			header('Location:?page=loomad');
		}else{
			header("Location: ?page=login");
			}
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

function kuva_puurid(){
	// siia on vaja funktsionaalsust
		if (empty($_SESSION['user'])) {
		header("Location: ?page=login");
	}
	
	global $puurid, $connection;
	
	$query = "SELECT DISTINCT puur FROM KerstiM_loomaaed ORDER BY puur ASC";
	$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
	while ($row = mysqli_fetch_assoc($result)){
		$query = "SELECT * FROM `KerstiM_loomaaed` WHERE puur={$row['puur']}";
		$res = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
		while($loomarida = mysqli_fetch_assoc($res)) {
			$puurid[$row['puur']][]=$loomarida;
		}		
	}
	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["nimi"] == '' || $_POST["puur"] == '' ){
				$errors =array();
				if(empty($_POST["nimi"])) {
					$errors[] = "Sisesta nimi!";
				}
				if(empty($_POST["puur"])){
					$errors[] = "Sisesta puur!";
				}
				}else{
					upload('liik');
					$nimi = mysqli_real_escape_string ($connection, $_POST["nimi"]);
					$puur = mysqli_real_escape_string ($connection, $_POST["puur"]);
					$liik = mysqli_real_escape_string ($connection, "pildid/".$_FILES["liik"]["name"]);
					$sql = "INSERT INTO agrigorj_loomaaed (nimi, puur, liik) VALUES ('$nimi','$puur','$liik')";
					$result = mysqli_query($connection, $sql);
					$id = mysqli_insert_id($connection);
					if($id){
						header("Location: ?page=loomad");
					}else{
						header("Location: ?page=loomavorm");
					}
				}
			}
		}
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

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