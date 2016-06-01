<?php

ini_set("display_errors", 1);
require_once('functions.php');
start_session();
connect_database();

$page="main";

if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('head.php');

switch($page){
	case "main":
		kuva_main();
	break;
	case "events":
		kuva_events();
	break;
	case "gallery":
		kuva_gallery();
	break;
	case "contact":
		kuva_contact();
	break;
	case "booking":
		kuva_booking();
	break;
	case "login":
		kuva_login();
	break;
	case "registration":
		kuva_registration();
	break;
	case "logout":
		logout();
	break;
	
	default:
		include_once("views/main.php");
	break;
}

include_once("foot.php");

?>


