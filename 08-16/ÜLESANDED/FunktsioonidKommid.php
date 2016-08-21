<?php
function connect_db(){
  global $L;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $L = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
  mysqli_query($L, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($L));
}


function lisa_kommentaar($pid) {
  global $L;

  $content=mysqli_real_escape_string($L,$_POST['content']);

  $sql="INSERT INTO KM_kommentaarid (postitus_id, content, postedat) VALUES ($pid, '$content', NOW() )";
  $result = mysqli_query($L, $sql);

    if ($result){
      // kÃµik ok
      $_SESSION['message']="postitamine õnnestus";
      header("Location: ?");
      exit(0);
    } else {
      $errors[]="postitamine luhtus";
    }
    include("Kommid.html");
}




/*
//postituse tegemine
function post_it(){
	global $L;

	if(empty($_POST)){
      $errors=array();
			// turva
			$title=mysqli_real_escape_string($L,$_POST['title']);
			$content=mysqli_real_escape_string($L,$_POST['content']);
			//$user=mysqli_real_escape_string($L,$_SESSION['user']['id']);

			$sql="INSERT INTO KM_kommentaarid (title, content, /*kasutaja_id,*/ /*postedat) VALUES ('$title', '$content',/* $user,*/ /*NOW() )";
			$result = mysqli_query($L, $sql);
			if ($result){
				// kÃµik ok
				$id = mysqli_insert_id($L);
				$_SESSION['message']="postitamine õnnestus";
				header("Location: ?");
				exit(0);
			} else {
				$errors[]="postitamine luhtus";
			}
		}
	include("Kommid.html");
}


//kommentaari tegemine, salvestamine andmebaasi
function tee_komment($pid){
global $L;

if (!empty($_POST)){
	if (empty($_SESSION['user'])) {
		$_SESSION['message']="Kommenteerimiseks pead olema sisse logitud ";
		header("Location: ?page=post&id=$pid");
		exit(0);
	}
				if (empty($_POST['content'])){
					$errors[]="kommentaari sisu ei saa olla tühi";
				} else {
					// tekitame kommentaari
					$cont = mysqli_real_escape_string($L, $_POST['content']);
					$uid = mysqli_real_escape_string($L, $_SESSION['user']['id']);

					$sql = "INSERT INTO KM_kommentaarid (kasutaja_id, postitus_id, content, postedat) VALUES ($uid, $pid, '$cont', NOW() )";
					$res= mysqli_query($L, $sql);
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

//kommentaaride hankimine andmebaasist
function hangi_kommentaarid($pid){
	global $L;
	$kommid=array();
	$sql = "SELECT c.*, k.username as kommenteerija FROM KM_kommentaarid c, KeMBkasutajad k WHERE postitus_id=$pid AND k.id = c.kasutaja_id";
	$result = mysqli_query($L, $sql);
	while ($r=mysqli_fetch_assoc($result)){
		$kommid[]=$r;
	}
	return $kommid;
}

//postitute kuvamine pealehel
function kuva_post() {
	global $L;
	$post=array();
	$jama=false;
	if (!empty($_GET['id'])) {
		$id = mysqli_real_escape_string($L,$_GET['id']);
		$sql = "SELECT p.*, k.username as postitaja FROM KM_kommentaarid p, KeMBkasutajad k WHERE p.id=$id AND k.id=p.kasutaja_id";
		$result = mysqli_query($L, $sql);
		if ($result && mysqli_num_rows($result)>0){
			$post=mysqli_fetch_assoc($result);
			// uus kommentaar?
			tee_komment($id);
			// eksisteerivad kommentaarid?
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
	$sql = "SELECT p.*, k.username as postitaja, (SELECT count(*) FROM KM_kommentaarid WHERE postitus_id = p.id ) as komme FROM KeMBpostitused p, KeMBkasutajad k WHERE k.id=p.kasutaja_id ORDER BY postedat DESC LIMIT 10";
	$result = mysqli_query($L, $sql);
	while ($r=mysqli_fetch_assoc($result)){
		$tulemused[]=$r;
	}
	return $tulemused;
}

//kommentaaride kuvamine pealehel?
function kuva_postitused(){
	global $L;
	$postitused=array();
	$jama=false;
	if (!empty($_GET['user'])) {
		$user = mysqli_real_escape_string($L,$_GET['user']);
		$sql = "SELECT p.*, k.username as postitaja, (SELECT count(*) FROM KM_kommentaarid WHERE postitus_id = p.id ) as komme FROM KeMBpostitused p, KeMBkasutajad k WHERE k.id=p.kasutaja_id AND k.username='$user' ";
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
*/

?>
