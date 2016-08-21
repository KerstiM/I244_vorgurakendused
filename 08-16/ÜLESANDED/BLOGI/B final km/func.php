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
			// tekitame muutuja kuhu kommentaar salvestada
			$cont = mysqli_real_escape_string($L, $_POST['content']);
      // kommentaari sisestamine myphp-sse
			$sql = "INSERT INTO KmKommentaarid (postitus_id, content, postedat) VALUES ($pid, '$cont', NOW() )";
			$res= mysqli_query($L, $sql);
  			if ($res){
  				$_SESSION['message']="Kommenteerimine õnnestus";
  			} else {
  				$_SESSION['message']="Kommenteerimine ebaõnnestus";
  			}
  			header("Location: ?page=post&id=$pid");
			     exit(0);
		}
	}


//Kommentaari kuvamine
function kuva_kommentaarid($pid){

	global $L;
	$kommid=array();
	$sql = "SELECT c.* FROM KmKommentaarid c WHERE postitus_id=$pid";
	$result = mysqli_query($L, $sql);
	while ($r=mysqli_fetch_assoc($result)){
		$kommid[]=$r;
	}
	return $kommid;
}


?>
