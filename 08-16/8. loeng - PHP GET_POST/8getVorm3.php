<?php
if ( !empty($_GET['loenda']) && !empty($_GET['nimi'])) { //kontrollime kas on olemas muutuja "loenda" ja "nimi"
    for ($i=0; $i < $_GET['loenda']; $i++) {
      echo "Tere, {$_REQUEST['nimi']}!<br/>\n"; //Request on nii Get ja Post omandustega.
    }
} else {
    echo "Info puudub või on täitmata!";
  }
?>

<pre>
  <?php print_r($_GET); ?>
</pre>
