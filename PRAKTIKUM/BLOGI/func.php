<?php
/*
ini_set('display_errors', 1); 
error_reporting(E_ALL);
*/

//loome andmebaasi ühenduse
function connect_db(){
  global $L;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $L = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga 𨥮dust");
  mysqli_query($L, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($L));
}

function reg(){
	global $L; //muutuja $L registreerimises kättesaadav nüüd
	if(!empty($_POST)){ //errors alguses tühi massiiv
		$errors=array();
		//kui on tühjad lahtrid, siis tulevad veateated
		if (empty($_POST['username'])){
			$errors[]="kasutajanimi vajalik!";
		}
		if (empty($_POST['passwd'])){
			$errors[]="parool vajalik!";
		}
		if (empty($_POST['passwd2'])){
			$errors[]="parooli peab 2 korda panema!";
		}
		if(!empty($_POST['passwd']) && !empty($_POST['passwd2']) && $_POST['passwd']!=$_POST['passwd2']) {
			// mõlemad on olemas, aga ei võrdu
			$errors[]="paroolid peavad olema samad!";
		}
		//tahame andmebaasi sisestada
		if (empty($errors)){
			// turva  - ühendusel $L ja väärtusel $_POST['username']
			$user=mysqli_real_escape_string($L,$_POST['username']);
			$pass=mysqli_real_escape_string($L,$_POST['passwd']);
			//nüüd teeme päringu. true v false väärtus tuleb
			$sql="INSERT INTO 00KeM_Bkasutajad (username, passwd) VALUES ('$user', SHA1('$pass'))";
			$result = mysqli_query($L, $sql);
			if ($result){
				// kõik ok, 
				$_SESSION['message']="Registreerumine õnnestus, logi sisse";
				header("Location: ?page=login");
				exit(0);
			} else {
				$errors[]="Registreerumine luhtus, proovi hiljem jälle...";
			}
		}
	}
	include_once("views/head.html");
	include("views/register.html");
	include_once("views/foot.html");
}

function logi(){
	global $L;
	if(!empty($_POST)){
		$errors=array();
		if (empty($_POST['username'])){
			$errors[]="kasutajanimi vajalik!";
		}
		if (empty($_POST['passwd'])){
			$errors[]="parool vajalik!";
		}
		
		if (empty($errors)){
			// turva
			$user=mysqli_real_escape_string($L,$_POST['username']);
			$pass=mysqli_real_escape_string($L,$_POST['passwd']);
			
			$sql="SELECT id, username, role FROM 00KeM_Bkasutajad WHERE username = '$user' AND passwd = SHA1('$pass')";
			$result = mysqli_query($L, $sql);
			if ($result && $user = mysqli_fetch_assoc($result)){ 
				// kõik ok, muutjas $user on massiiv
				$_SESSION['user']=$user; // $_SESSION['user']['id']
				$_SESSION['message']="Login õnnestus";
				header("Location: ?");
				exit(0);
			} else {
				$errors[]="login luhtus, kas oli õige info?";
			}
		}
	}
	include_once("views/head.html");
	include("views/login.html");
	include_once("views/foot.html");
}

function post_it(){
	global $L;
	// logimata või logitud tavakasutaja
	if (empty($_SESSION['user']) || (!empty($_SESSION['user']) && $_SESSION['user']['role']!="poster")){
		$_SESSION['message']="Postitamiseks puuduvad õigused";
		header("Location: ?");
		exit(0);
	}
	
	if(!empty($_POST)){
		$errors=array();
		if (empty($_POST['title'])){
			$errors[]="pealkiri vajalik!";
		}
		if (empty($_POST['content'])){
			$errors[]="postituse sisu vajalik!";
		}
		
		if (empty($errors)){
			// turva
			$title=mysqli_real_escape_string($L,$_POST['title']);
			$content=mysqli_real_escape_string($L,$_POST['content']);
			$user=mysqli_real_escape_string($L,$_SESSION['user']['id']);
			//nüüd teeme päringu. true v false väärtus tuleb
			//$user pole komaisid, sest kasutaja_id on nr. NOW lisab hetke aja.
			$sql="INSERT INTO 00KeM_Bpostitused (title, content, kasutaja_id, postedat) VALUES ('$title', '$content', $user, NOW() )";
			$result = mysqli_query($L, $sql);
			if ($result){ 
				// kõik ok
				$id = mysqli_insert_id($L);
				$_SESSION['message']="postitamine õnnestus";
				header("Location: ?page=post&id=$id");
				exit(0);
			} else {
				$errors[]="postitamine luhtus";
			}
		}
	}
	include_once("views/head.html");
	include("views/sub_post.html");
	include_once("views/foot.html");
}

function edit_post() {

global $L;
if (!empty($_GET['id'])) {
	$id = mysqli_real_escape_string($L, $_GET['id']);
	$sql = "SELECT * FROM 00KeM_Bpostitused WHERE id=$id ";
		$result = mysqli_query($L, $sql);
		if ($result && mysqli_num_rows($result)>0){
			$post=mysqli_fetch_assoc($result);
		}else {
			$_SESSION['message']="Sellist postitust ei eksisteeri";
			header("Location: ?");
			exit(0);
		}
	// logimata või logitud tavakasutaja
	if (empty($_SESSION['user']) || (!empty($_SESSION['user']) && $post['kasutaja_id']!= $_SESSION['user']['id'])  ){
		$_SESSION['message']="muutmiseks puuduvad õigused";
		header("Location: ?");
		exit(0);
	}
	
	if(!empty($_POST)){
		$errors=array();
		if (empty($_POST['title'])){
			$errors[]="pealkiri vajalik!";
		} else {
			$post['title']=$_POST['title'];
		}
		if (empty($_POST['content'])){
			$errors[]="postituse sisu vajalik!";
		} else {
			$post['content']=$_POST['content'];
		}
		
		if (empty($errors)){
			// turva
			$title=mysqli_real_escape_string($L, $post['title']);
			$content=mysqli_real_escape_string($L, $post['content']);
			$sql="UPDATE 00KeM_Bpostitused SET title='$title', content='$content' WHERE id=$id";
			$result = mysqli_query($L, $sql);
			if ($result){ 
				// kõik ok
				$_SESSION['message']="muutmine õnnestus";
				header("Location: ?page=post&id=$id");
				exit(0);
			} else {
				$errors[]="muutmine luhtus";
			}
		}
	}
} else {
	$_SESSION['message']="Postitus määramata";
	header("Location: ?");
	exit(0);
} 
	include_once("views/head.html");
	include("views/edit_post.html");
	include_once("views/foot.html");
}

function tee_komment($pid){
global $L;

if (!empty($_POST)){
	if (empty($_SESSION['user'])) {
		$_SESSION['message']="Kommenteerimiseks pead olema sisse logitud ";
		header("Location: ?page=post&id=$pid");
		exit(0);
	}
				if (empty($_POST['content'])){
					$errors[]="kommentaari sisu ei saa olla tühi"; //massiivi pole tegelikult vaja, sest ainult üks veateade
				} else {
					// tekitame kommentaari
					// turva sisendi peab ära escapema, connection $L ja väärtus $_POST['content']
					$cont = mysqli_real_escape_string($L, $_POST['content']);
					//id on juba ära turvatud eespool, turvame userid
					$uid = mysqli_real_escape_string($L, $_SESSION['user']['id']);
					//päring ise kirjutada
					$sql = "INSERT INTO 00KeM_Bkommentaarid (kasutaja_id, postitus_id, content, postedat) VALUES ($uid, $pid, '$cont', NOW() )";
					$res= mysqli_query($L, $sql); //ühenduses L pannaks sql päring käima ka. praegu ei te eor die asja.
					if ($res){
						$_SESSION['message']="Kommenteerimine õnnestus :) ";
					} else {
						$_SESSION['message']="Kommenteerimine ebaõnnestus :( ";
					}
					header("Location: ?page=post&id=$pid");
					exit(0);
				}
			}
}

function hangi_kommentaarid($pid){ //kommentaaride tabeli lühend c, kasutajate tabeli lühend k
	global $L;
	$kommid=array();
	$sql = "SELECT c.*, k.username as kommenteerija FROM 00KeM_Bkommentaarid c, 00KeM_Bkasutajad k WHERE postitus_id=$pid AND k.id = c.kasutaja_id";
	$result = mysqli_query($L, $sql);
	while ($r=mysqli_fetch_assoc($result)){
		$kommid[]=$r;
	}
	return $kommid;
}

function kuva_post() {
	global $L;
	$post=array();
	$jama=false;
	if (!empty($_GET['id'])) {
		$id = mysqli_real_escape_string($L,$_GET['id']);
		$sql = "SELECT p.*, k.username as postitaja FROM 00KeM_Bpostitused p, 00KeM_Bkasutajad k WHERE p.id=$id AND k.id=p.kasutaja_id";
		$result = mysqli_query($L, $sql);
		if ($result && mysqli_num_rows($result)>0){
			$post=mysqli_fetch_assoc($result);
			// uus kommentaar?
			tee_komment($id);
			// eksisteerivad kommentaarid?  id juures, et teaks millise postituse kommentaare võtta
			$kommid = hangi_kommentaarid($id);
		}else {
			$jama=true;
		}
	} else {
		$jama=true;
	}
	
	if ($jama) {
		$_SESSION['message']="Sellist postitust ei eksisteeri";
		header("Location: ?");
		exit(0);
	}
	include_once("views/head.html");
	include("views/postitus.html");
	include_once("views/foot.html");
}
function hangi_postitused(){
	global $L;
	$tulemused=array();
	//ORDER BY abil saab vaadata millal midagi postitati, DESC kõige uuem ees, LIMIT 10 = näitab 10 uuemat postitust
	$sql = "SELECT p.*, k.username as postitaja, (SELECT count(*) FROM 00KeM_Bkommentaarid WHERE postitus_id = p.id ) as komme FROM 00KeM_Bpostitused p, 00KeM_Bkasutajad k WHERE k.id=p.kasutaja_id ORDER BY postedat DESC LIMIT 10";
	$result = mysqli_query($L, $sql);
	while ($r=mysqli_fetch_assoc($result)){
		$tulemused[]=$r;
	}
	return $tulemused;
}

function kuva_postitused(){
	global $L;
	$postitused=array();
	$jama=false;
	if (!empty($_GET['user'])) {
		$user = mysqli_real_escape_string($L,$_GET['user']);
		$sql = "SELECT p.*, k.username as postitaja, (SELECT count(*) FROM 00KeM_Bkommentaarid WHERE postitus_id = p.id ) as komme FROM 00KeM_Bpostitused p, 00KeM_Bkasutajad k WHERE k.id=p.kasutaja_id AND k.username='$user' ";
		$result = mysqli_query($L, $sql);
		while ($r=mysqli_fetch_assoc($result)){
			$postitused[]=$r;
		}
		if (empty($postitused)){
			$jama=true;
		}
	} else {
		$jama=true;
	}
	if ($jama) {
		$_SESSION['message']="Kas kasutaja puudu, ta ei eksisteeru või tal pole postitusi...";
		header("Location: ?");
		exit(0);
	}
	include_once("views/head.html");
	include("views/postitused.html");
	include_once("views/foot.html");
}
?>


















