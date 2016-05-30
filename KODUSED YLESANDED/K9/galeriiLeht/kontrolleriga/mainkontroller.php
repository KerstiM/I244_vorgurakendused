<?php
	
	/*$pildid = array (
		array("link" => "pildid/nameless1.jpg", "alt" => "nimetu 1"),
		array("link" => "pildid/nameless2.jpg", "alt" => "nimetu 2"),
		array("link" => "pildid/nameless3.jpg", "alt" => "nimetu 3"),
		array("link" => "pildid/nameless4.jpg", "alt" => "nimetu 4"),
		array("link" => "pildid/nameless5.jpg", "alt" => "nimetu 5"),
		array("link" => "pildid/nameless6.jpg", "alt" => "nimetu 6")
	);
	*/
	require_once("head.html");
	
	if (!empty($_GET["mode"])) {
		$mode=$_GET["mode"];
	} else {
		$mode="tyhi";
	}
	
	switch($mode){
		case "pealeht": 
			include("mainKontrolleriga.html");
			break;
		case "galerii":
			include("galleryKontrollerig.html");
			break;
		case "vote":
			include("contactKontrollerig.html");
			break;
		case "tulemus":
			include("eventsKontrolleriga.html");
			break;
		default:
			include("mainKontrolleriga.html");
			break;
	}

	require_once("foot.html");
?>