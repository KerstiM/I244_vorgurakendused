<?php
//ini_set("display_errors", 1);

$peegelpilt = "Kirjuta see tekst tagurpidi";

function peegel($peegelpilt) {
  for ($i = strlen($peegelpilt)-1; $i >= 0; $i--) {
    echo $peegelpilt[$i];
  }
}
peegel($peegelpilt);



?>
