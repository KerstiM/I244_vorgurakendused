<?php
for ($i=0; $i < $_GET['loenda']; $i++) {
  echo "Tere, {$_REQUEST['nimi']}!<br/>\n"; //Request on nii Get ja Post omandustega.
}
?>

<pre>
  <?php print_r($_GET); ?>
</pre>
