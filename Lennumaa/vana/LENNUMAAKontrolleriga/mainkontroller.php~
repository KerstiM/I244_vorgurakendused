<?php
	

	require_once("head.html");
	
	if (!empty($_GET["mode"])) {
		$mode=$_GET["mode"];
	} else {
		$mode="tyhi";
	}
	
	switch($mode){
		case "main": 
			include("main.html");
			break;
		case "gallery":
			include("gallery.html");
			break;
		case "contact":
			include("contact.html");
			break;
		case "events":
			include("events.html");
			break;
		default:
			include("main.html");
			break;
	}

	require_once("foot.html");
?>