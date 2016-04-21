<?php
session_start();
if(!isset($_SESSION["korv"])) { //tagame, et kor don olemas
	$_SESSION["korv"] = array();
	}

$kaubad=array("kampsun", "müts", "püksid", "sapad");

if (!empty{$_GET["lisa"]))
	//kas kaup eksisteerib
	if (isset($kaubad[$_GET["lisa"]])) {
		if (isset($_SESSION["korv"][$_GET["lisa"]])) {
			$_SESSION["korv"] $_GET["lisa"]]++; //oli olemas toode, suurenda
	} else {
		//polnud veel, lisa korvi!
		$_SESSION["korv"][$_GET["lisa"]]=1; //üks väärtus sest kogus on 1
	}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ostukorv</title>
	
	</head>
	<body>
	<?php foreach($kaubad as $id=>$kaup):?>
		<p><?php echo $kaup; ?> <a href="?lisa=<?php echo $id; ?>" >lisa!</a> </p>
	<?php endforeach; ?>
	<p>mine vaata <a href="ostukorv.php">ostukorvi</a></p>
	
	
	</body>
</html>