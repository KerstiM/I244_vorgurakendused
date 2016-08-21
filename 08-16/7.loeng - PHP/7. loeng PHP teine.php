<?php

echo "see muutuja '$asi' ei eksisteeri";
//vigane kood laseb edasi trükkida teisi asju. Pole hea.
// isset funktsioon aitab

function loenda_loomad($mitu=3) {
  for($i=1; $i<=$mitu ; $i++) {
    echo "\n<p>see on $i. loom</p>";
  }
}

loenda_loomad();
  echo "<hr/>";
loenda_loomad(10);

 ?>
<hr/>

 <?php
 $asi = "olemas!";
 if (isset($asi)){
   echo "see muutuja '$asi' ei eksisteeri";

   $i=0;
   while ($i<10) {
      echo "tere!";
      $i++;
   }
 }
  ?>
