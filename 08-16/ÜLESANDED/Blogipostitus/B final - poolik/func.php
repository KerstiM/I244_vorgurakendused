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

//Kommentaari tekitamine
function tekita_kommentaar($pid){
global $L;

if (!empty($_POST)){

				if (empty($_POST['content'])){
					$errors[]="kommentaari sisu ei saa olla tühi";
				} else {
					// tekitame kommentaari
					$cont = mysqli_real_escape_string($L, $_POST['content']);

					$sql = "INSERT INTO KmKommentaarid (postitus_id, content, postedat) VALUES ($pid, '$cont', NOW() )";
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

//kuva kommentaar
function hangi_kommentaarid($pid){
	global $L;
	$kommid=array();
	$sql = "SELECT c.* FROM KmKommentaarid c WHERE postitus_id=$pid";
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
		$sql = "SELECT p.*, k.username as postitaja FROM Bpostitused p, Bkasutajad k WHERE p.id=$id AND k.id=p.kasutaja_id";
		$result = mysqli_query($L, $sql);
		if ($result && mysqli_num_rows($result)>0){
			$post=mysqli_fetch_assoc($result);
			// uus kommentaar?
			tekita_kommentaar($id);
			// eksisteerivad kommentaarid?
			$kommid = hangi_kommentaarid($id);
		}else {
			$jama=true;
		}
	} else {
		$jama=true;
	}


	include_once("pealeht.html");

}

?>
