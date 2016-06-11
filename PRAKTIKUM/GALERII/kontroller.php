<?php
	session_start();
	$pildid = array (
		array("link" => "pildid/nameless1.jpg", "alt" => "nimetu 1"),
		array("link" => "pildid/nameless2.jpg", "alt" => "nimetu 2"),
		array("link" => "pildid/nameless3.jpg", "alt" => "nimetu 3"),
		array("link" => "pildid/nameless4.jpg", "alt" => "nimetu 4"),
		array("link" => "pildid/nameless5.jpg", "alt" => "nimetu 5"),
		array("link" => "pildid/nameless6.jpg", "alt" => "nimetu 6")
	);
	
	require_once("view/head.html");

	if(!empty($_GET["mode"])) {
		$mode = $_GET["mode"];
	} else {
		$mode = "tuhjus";
	}

	switch($mode){
		case "galerii":
			include("view/galerii.html");
			break;
		case "lisapilt":
			include("view/lisapilt.html");
			break;
		case "vote":
			if(!empty($_SESSION["voted_for"])){
				header("Location: http://enos.itcollege.ee/~kmiller/vorgurakendused/PRAKTIKUM/GALERII/kontroller.php?mode=tulemus");
				exit(0);
			} else {
				include("view/vote.html");
			}
			break;
		case "tulemus":
			include("view/tulemus.html");
			break;
		case "logout":
			$_SESSION = array();
			if (isset($_COOKIE[session_name()])) {
 	 			setcookie(session_name(), '', time()-42000, '/');
			}
			session_destroy();
			header("Location: http://enos.itcollege.ee/~kmiller/vorgurakendused/PRAKTIKUM/GALERII/kontroller.php?mode=galerii");
			exit(0);
		default:
			include("view/galerii.html");
			break;
	}

	require_once("view/foot.html");

?>
