<?php
require_once("FunktsioonidKommid.php");
connect_db();
session_start();

$mode = ""; //alguses tühi string
  if (!empty($_GET["page"])) { //kui pole, siis võta et parameeter page
    $mode=$_GET["page"];
  }

  switch($mode){
  	case "lisa_kommentaar":
  		lisa_kommentaar();
  	break;
  	/*case "posts":
  		kuva_postitused();
  	break;
  	case "postit":
  		post_it();
  	break;
*/
  	default:
  		include("Kommid.html");
  	break;
  }
  ?>
