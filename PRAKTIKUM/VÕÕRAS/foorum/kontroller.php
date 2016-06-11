<?php
ini_set("display_errors", 1);

require_once("functions.php");
alusta_sessioon();

$vastused = array (
	array("autor" => "testuser", "aeg" => "01.06.2016", "tekst" => "Kuidas teile meeldib see uus foorum? Ootan väga tagasisidet. Mida te sooviksite, et me muudaksime? Kas praegune kujundus on teie jaoks sobiv?"),
	array("autor" => "user2", "aeg" => "02.06.2016", "tekst" => "Mulle väga meeldib!"),
	array("autor" => "user3", "aeg" => "03.06.2016", "tekst" => "Võiks parem kujundus olla.")
);


if(isset($_GET["mode"])){
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
	case "foorum":
		kuva_foorum();
		break;
	case "write":
		kuva_write();
		break;
	case "read":
		kuva_read();
		break;
	case "reply":
		kuva_reply();
		break;
	case "logout":
		logout();
		break;
	default:
		kuva_avaleht();
		break;		
}


?>