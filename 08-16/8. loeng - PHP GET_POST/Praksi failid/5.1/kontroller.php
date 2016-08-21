<?php
session_start();
require_once("functions.php");
yheda();

$pildid = array(
		array("big"=>"Pictures/caution.gif", "small"=>"Thumbs/caution_small.gif", "alt"=>"silt"),
		array("big"=>"Pictures/closed.jpg", "small"=>"Thumbs/closed_small.jpg", "alt"=>"silt"),
		array("big"=>"Pictures/fly.jpg", "small"=>"Thumbs/fly_small.jpg", "alt"=>"silt"),
		array("big"=>"Pictures/fish.jpg", "small"=>"Thumbs/fish_small.jpg", "alt"=>"silt")
		);

$mode="vaikimisi";
if (!empty($_GET['mode'])){
	$mode=$_GET['mode'];
}
/*
if ($mode == "galerii"){
	include("galerii.html");
} elseif ($mode == "login"){
	include("login.html");
}*/
include("views/head.html");
switch($mode){
	case "galerii":		// galerii
		galerii();
	break;
	case "logout":
		$_SESSION=array();
		session_destroy();
		header("Location: ?");
	break;
	case "login":
		login();
	break;
	case "pildivorm":
		include("views/pildivorm.html");
	break;
	case "register":
		register();
	break;
	default:
		include("views/pealeht.html");
	break;
}
include("views/foot.html");

?>





