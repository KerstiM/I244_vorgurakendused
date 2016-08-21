<?php

  $loom = "kass";

  if ($loom=="kala") {
    echo "kala ujub vees.";
  } else if($loom=="hobune") {
    echo "Hobused söövad heina";
  } else if($loom=="koer") {
    echo "Koer närib konte";
  } else if($loom=="kass") {
    echo "Kass püüab hiiri";
  } else {
    echo "Ma ei tea mis loom ta on!";
  }


switch ($loom) {
  case "kala":
    echo "kala ujub vees.";
    break;
  case "hobune":
    echo "Hobused söövad heina";
    break;
  case "koer":
    echo "Koer närib konte";
    break;
  case "kass":
    echo "Kass püüab hiiri";
    break;
  default:
    echo "Ma ei tea mis loom ta on!";
    break;
}
 ?>
