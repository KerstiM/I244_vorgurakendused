<?php
require_once("func.php");
connect_db();
session_start();

$mode="";
if (!empty($_GET['page'])){
	$mode=$_GET['page'];
}

switch($mode){

	case "post":
		kuva_kommentaarid();
	break;

	default:
		include("pealeht.html");
	break;
}
?>
