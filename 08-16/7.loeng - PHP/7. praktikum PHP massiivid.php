<?php
//kahedimensionaalne massiiv
$pildid = array(
  array("nimi" => "Karje", "url" => "karje.jpg"),
  array("nimi" => "Toomas", "url" => "tom_profiil.gif")
);

foreach ($pildid as $pilt) {
  echo $pilt["url"]; // saan kõikide piltide nimed
  //echo "<img src=\"{pilt[url]}\"alt=\"mingi"/>";
};


?>
