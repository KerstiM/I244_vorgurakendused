<?php
//include annab faili puudumisel hoiatuse, aga töötab edasi
//require annab faili puudumisel veateate ja ei tööta edasi


for ($i=0; $i < 4; $i++) {
  include_once("7. loeng PHP seitsmes includitud fail.html");
}

echo "<hr/>";

for ($i=0; $i < 4; $i++) {
  include("7. loeng PHP seitsmes includitud fail.html");
}




?>
