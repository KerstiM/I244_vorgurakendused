<?php

$loomad = array("esimene"=>"kass", 22 =>"koer", "hobune");

$loomad[] = "lammas"; //automaatselt massiivi lõpus numbrilise võtmega
$loomad["viimane"] = "tuvi"; //ettemääratud võtmega väli
$loomad[2] = "paabulind";

echo "Esimene loom oli: ".$loomad["esimene"];
echo "<br/>Mingi loom oli ka: ".$loomad[22];
echo "<br/>Veoloom: ".$loomad[23]; //hobune
echo "<br/>Võtmega kaks: ".$loomad[2]; //paabulind

//massiiv massiivi sees
$kass = array ("toidud" => array( "kala", "piim", "rohi"),
"nimi" => "miisu" , "vanus" => "12");
echo "<br/>Kassi toit on: ".$kass["toidud"][1]; // "piim"

foreach ($kass as $vaartus) {
  echo "<br/>$vaartus";
}

foreach ($kass as $voti => $vaartus) {
  echo "<br/>$voti = $vaartus";
}

echo "<hr/><pre>";
print_r($kass);
echo "</pre>";
//echo "printinfo()";

//massiivist muutujate kustustamine unset($massiiv["võti"]);



/* //näidismassiivid
$kass = array();
$kass = array('Tom', 3, 'Hall' );
$kass = array(
 'nimi' => 'Tom',
 'vanus' => 3,
 'karv' => 'Hall'
);
*/

?>
