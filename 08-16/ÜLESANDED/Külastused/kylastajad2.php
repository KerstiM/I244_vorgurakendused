<?php
session_start();
  $loendur = "kylastajadLoenda2.txt";
  $f = fopen("kylastajadLoenda2.txt", "w");
  fwrite($f,"1");
  fclose($f);

  // Read the current value of our counter file
  $f = fopen($loendur,"r");
  $kylastajaid = fread($f, filesize($loendur));
  fclose($f);
  // Has visitor been counted in this session?
  // If not, increase counter value by one
  if(!isset($_SESSION['hasVisited'])) {
    $_SESSION['hasVisited']="yes";
    $kylastajaid++;
    $f = fopen($loendur, "w");
    fwrite($f, $kylastajaid);
    fclose($f);
  }
  echo "Sa oled külastaja number $kylastajaid sellel lehel";
  ?>
