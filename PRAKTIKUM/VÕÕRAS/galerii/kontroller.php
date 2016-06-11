<?php
ini_set("display_errors", 1);

require_once("functions.php");
alusta_sessioon();
connect_db();

if(!empty($_GET["mode"])){
	$mode = $_GET["mode"];
} else {
	$mode = "tuhjus";
}

switch($mode) {
	case "avaleht":
		kuva_avaleht();
		break;
	case "register":
		kuva_register();
		break;
	case "login":
		kuva_login();
		break;
	case "galerii":
		kuva_galerii();
		break;
	case "upload":
		kuva_upload();
		break;
	case "pilt":
		kuva_pilt();
		break;
	case "logout":
		logout();
		break;
	default:
		kuva_avaleht();
		break;		
}

	




?>