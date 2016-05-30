<?php
session_start(); //alustan sessiooni!
	
	$pildid = array (
		array("link" => "pildid/nameless1.jpg", "alt" => "nimetu 1"),
		array("link" => "pildid/nameless2.jpg", "alt" => "nimetu 2"),
		array("link" => "pildid/nameless3.jpg", "alt" => "nimetu 3"),
		array("link" => "pildid/nameless4.jpg", "alt" => "nimetu 4"),
		array("link" => "pildid/nameless5.jpg", "alt" => "nimetu 5"),
		array("link" => "pildid/nameless6.jpg", "alt" => "nimetu 6")
	);
	require_once("head.html");
	
	if (!empty($_GET["mode"])) {
		$mode=$_GET["mode"];
	} else {
		$mode="tyhi";
	}
	
	switch($mode){
		case "pealeht": 
			include("pealeht.html");
			break;
		case "galerii":
			include("galerii.html");
			break;
		case "vote":
			if(!empty($_SESSION["voted_for"])){
					header("Location: http://enos.itcollege.ee/~kmiller/vorgurakendused/K10/%C3%9CLESANNE/kontrolleriga/kontroller.php?mode=tulemus");
					exit(0);
				} else {
					include("vote.html");
				}
			break;
		case "tulemus":
			include("tulemus.html");
			break;
		default:
			include("pealeht.html");
			break;
		case "logOut";
			$_SESSION = array();
				if (isset($_COOKIE[session_name()])) {
	 	 			setcookie(session_name(), '', time()-42000, '/');
				}
			session_destroy();
			header("Location: http://enos.itcollege.ee/~kmiller/vorgurakendused/K10/%C3%9CLESANNE/kontrolleriga/kontroller.php?mode=pealeht");
			exit(0);
		default:
			include("pealeht.html");
			break;
	}

	require_once("foot.html");
?>