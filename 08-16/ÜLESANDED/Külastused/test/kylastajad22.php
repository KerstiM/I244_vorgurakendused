<?php
session_start();

//$loendur = "kylastajadLoenda.txt";
  $f = fopen("kylastajadLoenda22.txt", "w");
  fwrite($f,"1");
  fclose($f);

// Read the current value of our counter file
$f = fopen("kylastajadLoenda22.txt","r");
$kylastajaid = fread($f, filesize("kylastajadLoenda22.txt"));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $kylastajaid++;
  $f = fopen("kylastajadLoenda22.txt", "w");
  fwrite($f, $kylastajaid);
  fclose($f);
}
echo "Sa oled külastaja number $kylastajaid sellel lehel";
?>
