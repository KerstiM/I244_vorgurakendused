 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Include tekst</title>
    
    <style>
   
    </style>
</head>
<body>

<?php

$kassid= array( 
		array('nimi'=>'Miisu', 'vanus'=>5, 'omanikuNimi'=>'Mati', 'kaal'=>'2kg', 'karvaV2rv'=>'kollane', 'karvaPikkus'=>'lühike',), 
		array('nimi'=>'Villu', 'vanus'=>2, 'omanikuNimi'=>'Hardi', 'kaal'=>'3,2kg', 'karvaV2rv'=>'hall', 'karvaPikkus'=>'pikk',),
		array('nimi'=>'Lontu', 'vanus'=>1, 'omanikuNimi'=>'Meelis', 'kaal'=>'1,5kg', 'karvaV2rv'=>'must', 'karvaPikkus'=>'lühike',),
	);	
	foreach ($kassid as $kass) {			
		include "lisaTekst.html";
	}	
?>
</body>
</html> 