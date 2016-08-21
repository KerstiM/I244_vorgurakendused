<?php

$allowedExts = array("jpg", "jpeg", "gif", "png");
$allowedTypes = array("image/gif", "image/jpeg", "image/png", "image/pjpeg");
$extension = end(explode(".", $_FILES['pilt']["name"]));
$bytes= 1000000;
$loc = "images";



if (in_array($_FILES['pilt']["type"], $allowedTypes) && ($_FILES['pilt']["size"] < $bytes) && in_array($extension, $allowedExts) ) {
    // fail õiget tüüpi ja suurusega

    if ($_FILES['pilt']["error"] > 0) {
        echo "faili üleslaadimine luhtus, veakood: " . $_FILES['pilt']["error"];
    } else {

        if ( file_exists("$loc/" . $_FILES['pilt']["name"]) ) {
            // samanimeline fail on kaustas $loc olemas ära uuesti lae, prindi failinimi

            echo "fail $loc/".$_FILES['pilt']["name"]." juba eksisteerib";
        } else {
            // kõik ok, aseta pilt kausta $loc

            move_uploaded_file($_FILES['pilt']["tmp_name"], $loc."/" . $_FILES['pilt']["name"]);
            echo "faili ".$_FILES['pilt']["name"]." laadmine kausta $loc edukas";
        }
    }
} else {
    echo "Fail ei ole sobivat tüüpi või on vales mõõtmes";
}
?>
<br/><hr>

<?php
$c = sizeof($_FILES['pilt']["name"]);
echo "Kaustas on faile: " . $c . " tk."; // get files count
?>
