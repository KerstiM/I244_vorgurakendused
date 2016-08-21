
<?php
ini_set("display_errors", 1);
//funktsioonide kirjeldamine
function arvuta_hypo($k1, $k2){
	$sum = $k1*$k1 + $k2*$k2;
	$c = sqrt($sum);
	return $c;
}
//tegevused
$result = 0;
if (!empty($_POST)){
	$errors = array();
	if (empty($_POST['kaatet1'])){
		$errors[] = "Esimese kaateti pikkus on määramata!";
	}
	if (empty($_POST['kaatet2'])){
		$errors[] = "Teise kaateti pikkus on määramata!";
	}

	if(empty($errors)){
		$k1 = $_POST['kaatet1'];
		$k2 = $_POST['kaatet2'];
		$result = arvuta_hypo($k1, $k2);
	}
	include("kalkulaator.html");
} else {
	include("kalkulaator.html");
}

?>
