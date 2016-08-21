<?php
if ( isset($_GET['loenda']) && isset($_GET['nimi'])) { //kontrollime kas on olemas muutuja "loenda" ja "nimi"
  if ( $_GET['loenda'] != "" && $_GET['nimi'] != "" ) { //kontrollime kas on olemas muutuja "loenda" ja "nimi"
    for ($i=0; $i < $_GET['loenda']; $i++) {
      echo "Tere, {$_REQUEST['nimi']}!<br/>\n"; //Request on nii Get ja Post omandustega.
    }
  } else {
    echo "1 või mitu välja oli täitmata!";
  }
} else {
    echo "Info puudub!";
  }
?>

<pre>
  <?php print_r($_GET); ?>
</pre>
