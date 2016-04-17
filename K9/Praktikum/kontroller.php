<?php
require_once("functions.php");

$mode="";
if (!empty($_GEt["mode")) {
	$mode=$_GEt["mode"];
}
switch($mode) {
	case "ok":
		include("ok.php");
	break;
	case "kontroll":
		kontrolli_vormi();
		include("ok.php");
	break;
	default:
		 include("pealeht.php");
	break;
	
}

?>