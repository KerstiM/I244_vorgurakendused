<?php
ini_set("display_errors", 1);
require_once("functions.php");
yhenda_andmebaasiga();
alusta_sessioon();
$tekstid = array (
	array("pealkiri" => "Minu esimene sissekanne", "aeg" => "Kirjutatud: 01.06.2016", "tekst" => "See on minu esimene sissekanne päevikusse. Siin hakkan ma jagama oma mõtteid erinevatel teemadel.Teemasid, mis siin käsitlust leiavad on erinevat sorti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis malesuada mauris, et dapibus urna vulputate eget. Donec non sem bibendum, fringilla tortor id, sagittis justo. Pellentesque bibendum eros nec arcu scelerisque laoreet. Phasellus gravida pharetra ligula, suscipit mollis diam congue ac. Suspendisse id mi vel magna cursus pharetra. Mauris vitae felis ac eros imperdiet sagittis. Maecenas eu est vel nisl euismod congue. Vestibulum scelerisque pretium erat et condimentum. Quisque a urna accumsan lorem venenatis luctus id sit amet massa. Duis hendrerit lectus et ornare volutpat. Donec nec elementum nibh, ac suscipit nibh."),
	array("pealkiri" => "Minu teine sissekanne", "aeg" => "Kirjutatud 04.06.2016", "tekst" => "See on minu teine sissekanne. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis malesuada mauris, et dapibus urna vulputate eget. Donec non sem bibendum, fringilla tortor id, sagittis justo. Pellentesque bibendum eros nec arcu scelerisque laoreet. Phasellus gravida pharetra ligula, suscipit mollis diam congue ac. Suspendisse id mi vel magna cursus pharetra. Mauris vitae felis ac eros imperdiet sagittis. Maecenas eu est vel nisl euismod congue. Vestibulum scelerisque pretium erat et condimentum. Quisque a urna accumsan lorem venenatis luctus id sit amet massa. Duis hendrerit lectus et ornare volutpat. Donec nec elementum nibh, ac suscipit nibh."),
	array("pealkiri" => "Minu kolmas sissekanne", "aeg" => "Kirjutatud 08.06.2016", "tekst" => "See on minu kolmas sissekanne. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis malesuada mauris, et dapibus urna vulputate eget. Donec non sem bibendum, fring. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis malesuada mauris, et dapibus urna vulputate eget. Donec non sem bibendum, fringilla tortor id, sagittis justo. Pellentesque bibendum eros nec arcu scelerisque laoreet. Phasellus gravida pharetra ligula, suscipit mollis diam congue ac. Suspendisse id mi vel magna cursus pharetra. Mauris vitae felis ac eros imperdiet sagittis. Maecenas eu est vel nisl euismod congue. Vestibulum scelerisque pretium erat et condimentum. Quisque a urna accumsan lorem venenatis luctus id sit amet massa. Duis hendrerit lectus et ornare volutpat. Donec nec elementum nibh, ac suscipit nibh.<br/>Pellentesque bibendum eros nec arcu scelerisque laoreet. Phasellus gravida pharetra ligula, suscipit mollis diam congue ac. Suspendisse id mi vel magna cursus pharetra. Mauris vitae felis ac eros imperdiet sagittis. Maecenas eu est vel nisl euismod congue. Vestibulum scelerisque pretium erat et condimentum. Quisque a urna accumsan lorem venenatis luctus id sit amet massa. Duis hendrerit lectus et ornare volutpat. Donec nec elementum nibh, ac suscipit nibh.")
);
if(isset($_GET["mode"])){
	$mode = $_GET["mode"];
} else {
	$mode = "tuhjus";
}
switch($mode) {
	case "blogi":
		kuva_blogi();
		break;
	case "write":
		kuva_write();
		break;

	case "post":
		kuva_post();
		break;
	case "posts":
		kuva_postitused();
		break;
	case "edit":
		edit_post();
		break;
	default:
		kuva_avaleht();
		break;
}
?>
