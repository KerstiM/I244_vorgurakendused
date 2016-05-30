<?php
//see on mudel
function kontrolli_vormi() {
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["nimi"])) {
		// tee infoga midagi
	} else {
		$errors[]="nimi puudu!";
	}
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["vanus"])) {
		// tee infoga midagi
	} else {
		$errors[]="vanus puudu!";
	}
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["sugu"])) {
		// tee infoga midagi
	} else {
		$errors[]="sugu puudu!";
	}
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["kood"])) {
		// tee infoga midagi
	} else {
		$errors[]="kood puudu!";
	}
	//kontroll läbi
	if (empty($errors)){
		//kõik ok fail
		//siin peaks infoga midagi peale hakkama
		header ("Location: kontroller.php?mode=ok");
		exit(0);
	}
}
}
?>