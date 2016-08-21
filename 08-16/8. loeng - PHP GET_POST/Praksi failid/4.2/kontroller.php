<?php
require_once("functions.php");

$pildid = array(	
	array("big"=>"Pictures/caution.gif", "small"=>"Thumbs/caution_small.gif", "alt"=>"silt"),
		array("big"=>"Pictures/closed.jpg", "small"=>"Thumbs/closed_small.jpg", "alt"=>"silt"),
		array("big"=>"Pictures/fly.jpg", "small"=>"Thumbs/fly_small.jpg", "alt"=>"silt"),
		array("big"=>"Pictures/fish.jpg", "small"=>"Thumbs/fish_small.jpg", "alt"=>"silt")

		);
$mode="suvaline";
if (isset($_GET['mode']) && $_GET['mode']!=""){
	$mode=$_GET['mode'];
}
/*
if ($mode=="galerii"){
	include("galerii.html");
} else if($mode == "login"){
	include("login.html");
}*/
include("views/head.html");

switch($mode){
	case "galerii":
		include("views/galerii.html");
	break;
	case "login":
		login();
	break;
	case "register":
		register();
	break;
	case "pildivorm":	
		include("views/pildivorm.html");
	break;
	default:
		include("views/pealeht.html");
	break;
}

include("views/foot.html");

?>









