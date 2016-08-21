<?php
require_once("funk.php");
connect_db();
session_start();

$mode = ""; //alguses tühi string
  if (!empty($_GET["page"])) { //kui pole, siis võta et parameeter page
    $mode=$_GET["page"];
  }

  switch($mode){

  	case "Kommenteeri":
  		tee_komment();
  	break;

  	default:
  		$postitused = hangi_kommentaarid();
  		include("komm.html");
  	break;
  }

  ?>
