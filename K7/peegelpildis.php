<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Peegelpildis</title>
    
    <style>
    	font-family: 'Dancing Script', cursive;
    </style>
</head>
<body>
<div>
    <h1>Peegelpildis</h1>
    
<?php
	$lause = "Tagurpidi lause";
	$lause_pikkus = strlen($lause);
	//	echo $lause_pikkus;
		
	function peegelda($lause) {
		$jupp = str_split($lause); //str_split muudab lause arrayks nimega jupp
		$n = count($jupp)-1; //loendab jupi array elemente
		for ($i = $n; $i > -1; $i--) { //count alustab viimasest t�hest
    		echo "$jupp[$i]"; // v�ljastab ts�klina kohal i asuvaid t�hti
		}
	}
	peegelda($lause);
?>
</div>
</body>
</html>